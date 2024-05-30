

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

