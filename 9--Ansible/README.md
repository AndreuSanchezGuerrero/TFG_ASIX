

### Introducció
- [Context del Projecte](#context-del-projecte)
- [Descripció del projecte](#descripció-del-projecte)
- [Objectius del Projecte](#objectius-del-projecte)
- [Avantatges i Desavantatges](#avantatges-i-desavantatges)

### Desenvolupament del Projecte
- [Instal·lació](#installació)
- [Configuració de la connexió a la base de dades](#configuració-de-la-connexió-a-la-base-de-dades)
- [Estructura de Continguts i Dades](#estructura-de-continguts-i-dades)
  - [Procés d'Inserció d'un Professor per part del Conserge](#procés-dinserció-dun-professor-per-part-del-conserge)
  - [Procés d'Alta d'un Professor](#procés-dalta-dun-professor)
- [Error 404](#error-404)

### Conclusions
- [Resultats Obtinguts](#resultats-obtinguts)
- [Potencials Millores Futures](#potencials-millores-futures)
- [Conclusió final](#conclusió-final)



# Introducció

## Context del projecte

En els darrers anys, la gestió i automatització d'infraestructures informàtiques ha esdevingut una necessitat fonamental per a moltes organitzacions. En aquest context, Ansible ha emergit com una de les eines més potents i flexibles per a la gestió de configuracions, desplegament d'aplicacions i automatització de tasques repetitives. Ansible té la capacitat d'administrar múltiples nodes, i per provar la seva funcionalitat amb diverses màquines virtuals, hem optat per una solució eficient.
Com que els nostres recursos són limitats, utilitzar VMware o VirtualBox per a la virtualització ens limitaria al nombre de màquines que podem aixecar. Per aquesta raó, hem triat utilitzar LXC i LXD.

## Descripció del projecte

Aquest projecte es centra en l'exploració i aplicació pràctica d'Ansible com a eina d'automatització. El treball inclou una visió general de les característiques clau d'Ansible, així com la descripció detallada de diversos casos d'ús pràctics. Aquests casos van complicant-se a mesura que avança el projecte. Per garantir la seguretat i eficiència en la gestió de les màquines, totes les màquines del projecte han estat configurades per permetre l'accés només mitjançant clau pública. Aquesta tècnica, coneguda com a hardening (enduriment), millora la seguretat del sistema en limitar les formes d'accés i reduir les vulnerabilitats. En aquest projecte, l'Ansible Tower és l'única màquina que ha distribuït la seva clau pública a tots els nodes gestionats, assegurant així un control centralitzat i segur.

## Objectius del projecte

Aquest treball té com a objectiu principal explorar les capacitats d'Ansible com a eina d'automatització. Els objectius específics inclouen:

- Proporcionar una visió general i comprensible d'Ansible, destacant les seves característiques i avantatges principals.
- Implementar diversos casos pràctics que demostrin la versatilitat i eficàcia d'Ansible en diferents contextos.
- Analitzar els resultats obtinguts a partir de les implementacions, destacant els beneficis i les limitacions trobades.
- Oferir recomanacions per a futurs usos i desenvolupaments d'Ansible en entorns de producció.

## A què ho aplicarem?

En aquest projecte, aplicarem Ansible en l'administració i gestió de **contenidors Linux**. Els contenidors Linux són una tecnologia que permet executar aplicacions de manera aïllada, garantint que cada aplicació tingui el seu propi entorn, incloent-hi biblioteques i altres dependències. Això facilita la consistència entre entorns de desenvolupament, proves i producció.

### Linux Containers

Els contenidors Linux permeten a diverses aplicacions compartir el mateix sistema operatiu mentre s'executen de manera independent. A diferència de les màquines virtuals, que requereixen una hipervisor i un sistema operatiu complet per a cada instància, els contenidors són més lleugers i consumeixen menys recursos, ja que comparteixen el mateix nucli del sistema operatiu. Això ens permet treballar sobre varies instancies a l'hora sense consumir molts recursos.

### Beneficis dels contenidors Linux

- **Eficiència de recursos:** En ser més lleugers que les màquines virtuals, els contenidors permeten un ús més eficient dels recursos del sistema.
- **Portabilitat:** Els contenidors poden executar-se de manera consistent en diferents entorns, des de l'ordinador d'un desenvolupador fins a servidors de producció.
- **Aïllament:** Cada contenidor s'executa en el seu propi entorn aïllat, la qual cosa redueix els conflictes de dependències i millora la seguretat.

En aquest projecte, utilitzarem Ansible per automatitzar la creació, configuració i gestió de contenidors Linux, demostrant així la seva eficàcia en la gestió d'infraestructures modernes.

# Desenvolupament del Projecte

## Instal·lació i configuració de Linux containers (LXC)

Enllaç on es documenta la instal·lació i configuració d'LXC.

[Instal·lació i configuració LXC](./instalacioLXC.md)

## Instal·lació d'ansible

Enllaç on es documenta l'instal·lació d'ansible

[Instal·lació d'ansible](./instalacioAnsible.md)

## Hardening del sistema

Configuració per permetre l'accés a les màquines només mitjançant clau pública i bloquejant totes les altres portes ssh. En aquest projecte, l'Ansible Tower és l'única màquina que ha distribuït la seva clau pública a tots els nodes gestionats, assegurant així un control centralitzat i segur. Per lo tant, solament l'ansible tower serà l'única màquina capaç d'accedir via ssh als nodes gestionats.

Enllaç on es documenta el procés de hardening realitzat al sistema. 

[Hardening del sistema](./hardening.md)

## Configuració bàsica d'ansible

Per defecte, ansible crea un directori a /etc/ansible que conté els seguents fitxers:

![Configuració bàsica](../.Images/ansible/defaultConf.png)

<br>

Al fitxer ansible.cfg indiquem on es mostre l'inventari

![Configuració bàsica](../.Images/ansible/basic_ansible_cfg.png)

<br>

Al fitxer de hosts indiquem les ips amb els seus hostnames i al grup que pertany.

![Configuració host](../.Images/ansible/basic_hosts.png)

<br>

Comprovem que la sintaxi està ben feta, ens retorna un json on ens diu que ‘all’, te un fill que es diu ungrouped (perquè encara no hem creat el grup)i més abaix podem veure que ungrouped te els hosts de les nostres maquines manejades.

![Comprovació bàsica](../.Images/ansible/ansible_comprovacio_basica.png)

<br>

Fem ping per comprovar que podem comunicarnos des del ansible tower als nodes manejats via ansible.

![ping 1](../.Images/ansible/ping1.png)

<br>

També podriem fer ping amb el grup que hem especificat.

![ping 2](../.Images/ansible/ping_2.png)

## Exemple 1 --> Escalar privilegis

En aquest cas canviem l'arxiu de ansible.cfg per el seguent:

**'privilege_escalation'**

Aquest apartat configura la manera en què Ansible gestionarà l'escalat de privilegis.

```ini
[defaults]
inventory = ./hosts

[privilege_escalation]
become=True
become_method=sudo
become_user=root
become_ask_pass=True

```

- **become=True -->** Aquest paràmetre habilita l'ús de become, una característica d'Ansible que permet executar tasques amb privilegis elevats.
- **become_method=sudo -->** Especifica que sudo serà la metodologia utilitzada per a escalar privilegis. sudo permet a un usuari ordinari executar comandes amb privilegis de superusuari.
- **become_user=root -->** Indica que l'usuari a través del qual s'executaran les tasques amb privilegis elevats serà root. 
- **become_ask_pass=True -->** Aquest paràmetre fa que Ansible demani la contrasenya de sudo abans d'executar qualsevol tasca que requereixi privilegis elevats. 100% necesaria.

<br>

Ara si executem la comanda:     ```bash ansible lxc_containers -m ping``` ens demanarà la contrasenya de la màquina amb la que podrem escalar privilegis fins convertirnos en root.

![Escalar privilegis](../.Images/ansible/ejemplo1_become.png)

<br><br>

## Exemple 2

Creem inventory-groups i afegim lo seguent:

```ini
[all:children]
ubuntu
webservers

[ubuntu]
u1 ansible_host=10.101.218.64
u2 ansible_host=10.101.218.132
[webservers]
u3 ansible_host=10.101.218.45
```

Definim un grup de grups, és a dir, tots els grups que s'inclouen a sota d'aquest títol seran considerats fills del grup 'all'. En aquest cas, els grups 'ubuntu' i 'webservers' formen part del grup 'all'.

Dins de cada grup tenim diferents hosts marcat.

**ubuntu**
- u1 amb IP: 10.101.218.64
- u2 amb IP: 10.101.218.132

**webservers**
- u3 amb IP: 10.101.218.45

<br>

Resultats obtinguts amb filtratge per grup.

1. Filtratge de tots els grups

    ![Ping1](../.Images/ansible/ejemplo2_ping.png)

2. Filtratge del grup ubuntu.

    ![Ping2](../.Images/ansible/ejemplo2_ping2.png)

3. Filtratge del grup webservers.

    ![Ping 3](../.Images/ansible/ejemplo2_ping3.png)

<br><br>
