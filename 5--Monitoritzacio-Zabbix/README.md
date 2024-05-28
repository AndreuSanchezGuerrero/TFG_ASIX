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
Hem creat diferents items per tenir vigilats certs aspectes de les maquines que estem controlant

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

Una llista dels parametres creats en ambdues maquines

![item_list_master](../.Images/zabbix/item_list_master.png) <br>
![item_list_worker](../.Images/zabbix/item_list_worker.png)


## Avisos sobre parametres controlats
Hem creat alertes per els diferents items i aixi avisar-nos per si passes alguna cosa

### De que s'avisará i perqué
### Comunes per ambdues maquines

- Alta utilització de la CPU
  - La CPU és un dels recursos més crítics en qualsevol sistema. Una alta utilització de la CPU pot indicar que els processos estan consumint molts recursos, cosa que pot afectar el rendiment del sistema. Si la CPU està sobrecarregada, els temps de resposta poden augmentar i les aplicacions poden tornar-se lentes o no respondre. És essencial monitoritzar i rebre alertes sobre l'alta utilització de la CPU per prendre mesures correctives abans que afecti els usuaris o serveis.
  
- Alta utilització de la memoria
  - La memòria (RAM) és vital per al rendiment de les aplicacions. Una alta utilització de la memòria pot portar a situacions de swapping, on el sistema comença a utilitzar el disc dur com a memòria addicional, cosa que és molt més lenta. Això pot degradar significativament el rendiment del sistema i causar que les aplicacions es ralentitzin o es bloquegin. Monitoritzar la memòria i rebre alertes sobre la seva alta utilització permet als administradors identificar i resoldre problemes abans que impactin en l'operació normal del sistema.
  

- Poc espai de disc disponible
  - L'emmagatzematge en disc és fonamental per a l'operació de qualsevol sistema. Tenir poc espai de disc disponible pot portar a fallades en el sistema, ja que les aplicacions i el sistema operatiu necessiten espai lliure per funcionar correctament. Problemes com la incapacitat de guardar dades, registres d'errors i fallades en els serveis poden ocórrer si l'espai en disc s'esgota. Rebre alertes sobre el baix espai en disc permet als administradors prendre mesures preventives, com netejar arxius innecessaris o afegir més capacitat d'emmagatzematge.
  
- Trafic d'entrada elevat
  - El trànsit d'entrada elevat pot indicar una alta demanda de serveis en el sistema, cosa que pot portar a la saturació de la xarxa o dels recursos del servidor. Pot ser un símptoma d'un augment en l'activitat legítima (per exemple, més usuaris accedint a un servei) o pot indicar possibles atacs de xarxa (com atacs DDoS). Monitoritzar i rebre alertes sobre el trànsit d'entrada elevat permet als administradors identificar ràpidament la causa i prendre les accions necessàries per mitigar l'impacte.

- Trafic de sortida elevat
  - El trànsit de sortida elevat pot ser un indici de diverses situacions, com la transferència de grans volums de dades, possibles exfiltracions de dades, o activitats malicioses dins de la xarxa (per exemple, malware enviant dades fora de la xarxa). Monitoritzar el trànsit de sortida i rebre alertes permet als administradors investigar i abordar qualsevol comportament anòmal, garantint la seguretat i l'eficiència de la xarxa.
  
### Exclusives del node master

- Estat de la API de Kubernetes no "ok"
  - La API de Kubernetes és el punt central de comunicació i gestió del clúster. Si la API no està operativa o té problemes, els components del clúster no poden interactuar correctament, cosa que afecta la creació, gestió i monitorització dels recursos. Això pot portar a la fallada de desplegaments, escalabilitat i altres operacions crítiques. Monitoritzar l'estat de la API de Kubernetes i rebre alertes sobre qualsevol problema permet als administradors reaccionar ràpidament per garantir la disponibilitat i el correcte funcionament del clúster.

- Pocs pods en estat "Running"
  - En un entorn de serveis, és essencial que els processos crítics estiguin en funcionament. Tenir pocs processos en estat "Running" pot indicar problemes amb la disponibilitat dels serveis. Això pot ser causat per fallades en les aplicacions, problemes de recursos en el servidor o configuracions incorrectes. Monitoritzar l'estat dels processos i rebre alertes quan hi ha pocs en estat "Running" permet als administradors prendre mesures ràpides per restaurar l'operativitat dels serveis i assegurar la continuïtat del servei.
  

### Creacio alertes (triggers)
En el següent enllaç es detalla com es crean les alertes

[Creacio d'alertes](triggers.md)

Una llista de les alertes creades en les dues maquines

![triggers_list_master](../.Images/zabbix/trigger_list_master.png) <br>
![triggers_list_worker](../.Images/zabbix/trigger_list_worker.png)


## Accions que es realizaran cuan salti un avís