# Projecte CPD MAS

### Introducció
- [Context del Projecte](#context-del-projecte)
- [Descripció del Projecte](#descripció-del-projecte)
- [Objectius del Projecte](#objectius-del-projecte)

### Desenvolupament del Projecte

- [Anàlisi de l'empresa que ens ha contractat](#anàlisi-de-lempresa-que-ens-ha-contractat)
- 

### Conclusions


### Fitxa Tècnica


<br><br><br>

# Introducció

## Context del Projecte

<p>El departament MASTECH de la nostra empresa MAS, i EcoTech, ens hem reunit per discutir les millors opcions que beneficiïn les dues companyies. Durant la reunió, van deixar clar la seva disposició a invertir calitat/preu en un Centre de Processament de Dades (CPD).

Implementar un CPD proporcionaria a EcoTech una infraestructura tecnològica més sòlida, segura i escalable que respaldaria el seu creixement continu i el seu compromís amb la innovació i la sostenibilitat ambiental.

En resposta a les seves necessitats, hem presentat la proposta següent:</p>

[Desenvolupament del projecte](#desenvolupament-del-projecte-1)

## Descripció del Projecte

<p>El projecte de Centre de Processament de Dades (CPD) per a EcoTech consisteix en la planificació, instal·lació i configuració d'una infraestructura tecnològica robusta que pugui suportar el creixement continu de l'empresa. Aquest CPD està dissenyat per proporcionar una plataforma segura, fiable i escalable que permetrà a EcoTech gestionar les seves operacions de manera més eficient i innovadora.</p>

## Components Principals del Projecte

1. Infraestructura Física:
    - **Sales de CPD:** Espai dedicat per allotjar el rack de servidors i el rack de comunicacions. També te allotjat dispositius de seguretat física.
    - **Racks i Dispositius:** Organització i distribució dels dispositius dins dels racks per optimitzar l'espai i la gestió del cablejat.

2. Xarxa i Comunicacions:
    - **Esquema de Xarxa:** Disseny d'un esquema de xarxa lògic i físic que asseguri la comunicació fluida i segura entre tots els dispositius.
    - **Switchos i Enrutadors/firewalls:** Utilització de switchos i enrutadors/firewalls que suportin protocols avançats com el RSTP (Rapid Spanning Tree Protocol) per evitar bucles de xarxa.

3. Seguretat i Fiabilitat:
    - **Seguretat Física:** Mesures per protegir físicament els equips, incloent controls d'accés i sistemes de vigilància.
    - **Seguretat de Xarxa:** Implementació de VLANs i altres mesures per segmentar la xarxa i protegir les dades sensibles.

4. Gestió de Dades:
    - **Servidors:** Utilització de servidors HP DL360 GEN10 amb tecnologia reacondicionada per garantir el rendiment i la fiabilitat.
    - **Virtualització:** Implementació de tecnologies de virtualització per optimitzar l'ús dels recursos del servidor.
    - **Emmagatzematge:** Utilització d'un NAS (Network Attached Storage) per a còpies de seguretat i gestió de dades.

5. Procediments de Backup:
    - **Automatització de Backups:** Configuració de scripts i cron jobs per realitzar còpies de seguretat diàries de les bases de dades i altres dades crítiques.
    - **Emmagatzematge de Backups:** Guardar còpies de seguretat en ubicacions segures per garantir la recuperació de dades en cas de fallada del sistema.

6. Escalabilitat i Creixement:
    - **Planificació per al Futur:** Disseny del CPD tenint en compte el creixement futur d'EcoTech, assegurant que la infraestructura pugui ser ampliada fàcilment.
    - **Tecnologies Innovadores:** Incorporació de tecnologies innovadores que suportin els objectius de sostenibilitat i eficiència d'EcoTech.

## Beneficis Esperats
    
- **Millora en la Gestió de Dades:** Una infraestructura més robusta i fiable permetrà a EcoTech gestionar les seves dades de manera més eficient.
- **Seguretat Avançada:** Les mesures de seguretat implementades protegiran les dades sensibles contra amenaces internes i externes.
- **Escalabilitat:** La infraestructura escalable assegura que el CPD pugui créixer juntament amb EcoTech, adaptant-se a les necessitats canviants de l'empresa.
- **Eficiència Operativa:** La virtualització i altres tecnologies innovadores milloraran l'eficiència operativa, permetent a EcoTech oferir millors serveis als seus clients.

<br><br><br>

# Desenvolupament del Projecte

## Anàlisi de l'empresa que ens ha contractat

<p>"EcoTech" és una empresa ficticia que es dedica a la producció i comercialització de tecnologies ecològiques.

El seu enfocament principal radica en el desenvolupament i la venda de productes tecnològics dissenyats per promoure la sostenibilitat ambiental i l'eficiència energètica.
</p>

## Distribució de l’empresa per sales

<p>Aquesta secció descriu com es distribueixen les diferents sales dins de l'empresa, incloent sales de servidors, sales de treball i altres àrees crítiques per a l'operació del CPD.</p>

## Comunicació entre racks

<p>Descriu els mètodes i tecnologies utilitzades per garantir una comunicació eficient i segura entre els diferents racks dins del CPD.</p>

## Distribució dels dispositius dintre del rack

<p>Detalla com es col·loquen els dispositius dins de cada rack per optimitzar l'espai, la refrigeració i l'accessibilitat per al manteniment.</p>

## Esquema lògic de xarxa

<p>Es presenta un esquema lògic de la xarxa que mostra com es connecten els dispositius dins del CPD.</p>

### Model de 3 capes

<p>Explicació del model de xarxa de 3 capes utilitzat, que inclou la capa d'accés, la capa de distribució i la capa de nucli.</p>

### ISP Orange

<p>Detalls sobre la connexió a internet a través del proveïdor ISP Orange.</p>

### ISP Movistar

<p>Detalls sobre la connexió a internet a través del proveïdor ISP Movistar.</p>

## Organització de xarxa

### Evitar bucles amb RSTP

<p>Com evitem els bucles que produeix la redundància a la xarxa mitjançant l'ús del protocol RSTP (Rapid Spanning Tree Protocol).</p>

### Separació de la xarxa per subxarxes i VLANs

<p>Descripció de com es divideix la xarxa en subxarxes i VLANs per als diferents departaments de l'empresa utilitzant 802.1Q VLAN Tagging.</p>

## Servidors que fem servir

### Descripció del sistema

<p>Tenim 3 servidors HP DL360 GEN10 8SFF № 140.E-5766 amb tecnologia reacondicionada. Aquests servidors es configuren en un cluster per optimitzar el rendiment i la disponibilitat dels serveis.</p>

### Procediment de Backup

<p>Detall del procediment automatitzat de còpies de seguretat diàries per garantir la integritat i disponibilitat de les dades.</p>

## Seguretat del CPD

### Ubicació física del CPD

<p>Detalls sobre la ubicació física del CPD i les mesures preses per protegir-lo.</p>

### Accés a la sala del CPD

<p>Mesures de control d'accés a la sala del CPD per garantir que només el personal autoritzat pugui accedir-hi.</p>

### Seguretat física del CPD

<p>Mesures de seguretat física implementades per protegir els equips dins del CPD.</p>

<br><br><br>

# Conclusions

## Conclusió final

<p>El projecte CPD MAS ha complert amb èxit els objectius plantejats, proporcionant una infraestructura robusta i segura per a l'empresa. Les mesures implementades asseguren la continuïtat del servei i la protecció de les dades.</p>

<br><br><br>

# Fitxa Tècnica

**Nom del Projecte:** Projecte CPD MAS

**Empresa Desenvolupadora:** MASDEV

**Tecnologies Utilitzades:**
- **Servidors:** HP DL360 GEN10 8SFF
- **Switchos:** Amb suport per a RSTP
- **Protocol de xarxa:** 802.1Q VLAN Tagging
- **Programari de Virtualització:** Detall del programari utilitzat per gestionar els servidors virtualitzats
- **Sistemes de Backup:** NAS (Network Attached Storage)
- **Procediments de Backup:** Automatitzats amb cron jobs

**Descripció del Sistema:**
- **Infraestructura de Xarxa:** Model de 3 capes amb connexions a ISP Orange i ISP Movistar
- **Servidors:** Configurats en cluster per a alta disponibilitat i escalabilitat
- **Seguretat:** Implementació de mesures de seguretat física i lògica per protegir els equips i les dades

**Enllaços Relacionats:**
- [Detalls del Switch de Capa 3](enllaç-a-switch-capa-3)
- [Detalls del Switch de Capa 2](enllaç-a-switch-capa-2)
- [Captura de RSTP](enllaç-a-captura-rstp)
