# Creacio de accions a realitzar quan salti una alerta

## Com crear una acció (trigger actions)
Abans de començar amb la creació, hem de configurar el `Media type` de Email per indicar amb quins parametres ha d'enviar correus. 

Primer hem d'obrir a la safata d'entrada del compte desde la que es enviaran els correus i anar a `Gestiona el teu compte de Google -> Seguretat -> Accés d'aplicacions menys segures` i activem l'unica opcio que surt

![less_safe_apps](../.Images/zabbix/less_safe_apps.png)
 
Una vegada fet aixo, en l'intrficie web naveguem a `Admninistration -> Media types -> Email` i canviem els següents valors:

- Servidor SMTP: smtp.gmail.com
- Port del servidor SMTP: 587
- SMTP helo: <nom_servidor>
- Correu-e SMTP: <compte_origen>
- Seguretat de la connexió: STARTTLS
- Authenticació: Nom d'usuari i paraula de pas
  - Nom d'usuari: <usuari\>
  - Paraula de pas: <contrasenya\>

Actualitzem el `Media type` i procedim a configurar l'usari que rebra aquest correus
Per aixo, viatjem a `Administration -> Users -> <usuari> -> Media` i afegim una nova amb les següents caracteristiques.

- Tipus: Email
- Enviar a: <correu\>

![user_media](../.Images/zabbix/user_media.png)

Ara, ja podrem crear l'accio en si. En aquest cas, crearem una de prova. Anem a `Configuration -> Actions -> Trigger actions -> Create action` i omplenem els camps i el creem

- Nom: prova
- Condició:
  -  Tipus: trigger
  -  Operador: és igual
  -  Triggers: `kubernetes master: Pods en estat "Running"`
- Operació:
  - Enviar als grups d'usuaris: Zabbix administrators
  - Enviar només a: Email

Una vegada creat, per provar el seu funcionament, forçarem que salti el trigger configurat a l'accio.

Per forçar-ho, utilitzarem la comanda `kubectl` al node master per "dir-li" al clúster que no intenti replicar cap instancia de phpmyadmin, simulant la caiguda del mateix

```bash
kubectl scale --replicas=0 deployment/phpmyadmin
```

Passat 1 minut (ja que l'item esta configurat per comprobar la quantitat de pods en estat "Running" cada minut), automaticament enviara un correu electronic a tots el usuaris que pertanyin al grup `Zabbix adminisrators`.

Si anem a la bustia d'un dels membres d'aquest grup, podrem veure un correu com aquest

![trigger_mail](../.Images/zabbix/trigger_mail.png)

Per finalitzar, com tot funciona correctament, tornem a "dir-li" al clúster que repliqui la instancia de phpmyadmin que hi ha normalment

```bash
kubectl scale --replicas=1 deployment/phpmyadmin
```


