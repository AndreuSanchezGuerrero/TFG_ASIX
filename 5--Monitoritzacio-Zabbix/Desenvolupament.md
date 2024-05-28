# Desenvolupament del projecte

## Instal·lació
El nostre Zabbix està instal·lat en un Ubuntu Server (versió 24.04 LTS) utilitzant nginx, MySQL i PHP. Al següent enllaç es detalla el procés d'instal·lacio:

[Procés d'instal·lació](instalacio.md)

## Afegir hosts
Hem escollit afegir 2 maquines per poder monitoritzar-los amb aquesta eina
- 2 Ubuntu Server (22.04 LTS) membres d'un mateix clúster de Kubernetes
  - 1 Node master
  - 1 Node worker

Al següent enllaç es detallen les passes seguides:

[Com afegir hosts](afegir_hosts.md)

## Monitoritzar parametres
### Que es monitoritzará i perque
#### Comuns per ambdues maquines

- Utilització de CPU
  - La utilització de la CPU és un indicador clau de la càrrega de treball i la capacitat de processament disponible en el node. Monitoritzar aquest paràmetre ajuda a identificar quan el node està sota una càrrega excessiva, la qual cosa pot afectar el rendiment de les aplicacions en execució.

- Utilització de Memòria
  - La memòria disponible és crucial per al funcionament fluid dels pods i les aplicacions. Un ús elevat de memòria pot portar a situacions de swapping, on el rendiment es degrada significativament. Monitoritzar aquest paràmetre permet prendre accions preventives abans que s’esgoti la memòria.
  
- Ús del Disc
  - L'espai en disc és vital per a l'emmagatzematge de dades d'aplicacions, logs i altres fitxers temporals. La manca d'espai en disc pot causar fallades en les aplicacions i en el sistema operatiu. Monitoritzar aquest paràmetre assegura que sempre hi hagi prou espai disponible.

- Ús de Xarxa (Entrada i Sortida)
  - La utilització de la xarxa és crucial per a la comunicació entre els nodes i amb l'exterior. Monitoritzar el tràfic de xarxa ajuda a detectar colls d'ampolla, possibles atacs DDoS, i assegura que el tràfic de dades sigui fluid i sense interrupcions.

#### Exclusius del node master

- Estat de l'API Server
  - La monitorització de l'estat de l'API de Kubernetes és essencial per garantir la disponibilitat i la funcionalitat del Control Plane. Detecta possibles fallades en el component central de gestió, permetent una ràpida resposta davant problemes crítics i assegurant l'operació contínua del clúster.

- Estat dels Pods
  - La monitorització de l'estat dels pods assegura la disponibilitat i el rendiment de les aplicacions desplegades en Kubernetes. Detecta fallades en la creació, execució o terminació dels pods, permetent una gestió proactiva de problemes que podrien afectar l'experiència de l'usuari i l'operació del negoci.


### Creació parametres (items)

En el següent enllaç es detalla com hem creat els items.

[Creacio d'items](items.md)