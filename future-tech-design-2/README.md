# Documentation ESP8266 ESP-NOW

![Exemple d'image](assets/title_img.png)

## Introduction
Ce guide décrit la mise en place d'une communication entre deux modules ESP8266 à l'aide de ESP-NOW. Un module agit comme émetteur, lisant les valeurs d'un joystick analogique, tandis que l'autre module sert de récepteur, contrôlant deux moteurs et un servomoteur en fonction des données reçues.

## fichiers
📦tony-tuning
 ┣ 📂joystick
 ┃ ┗ 📜joystick.ino
 ┗ 📂car
 ┃ ┗ 📜car.ino

## Prérequis
### Composants Requis :
2x ESP8266 Modules: Un pour l'émetteur et un pour le récepteur.
Module Pont H (ex. L298N): Utilisé pour inverser la direction des moteurs  et contrôler leur vitesse.
2x Moteurs : Moteurs commandés par le pont H.
1x Servomoteur: Pour ajuster la direction en réponse aux signaux du joystick.
1x Régulateur de Tension L7805: Pour stabiliser la tension d'alimentation de l'ESP8266 à 5V.
1x Pile 9V: Source d'alimentation principale du système.
Câbles et connecteurs: Pour relier tous les composants.

### Logiciel :
IDE Arduino avec le support ESP8266 installé
Bibliothèques nécessaires : ESP8266WiFi, espnow, Servo

## Configuration de l'émetteur ESP8266 (avec le fichier joystick.ino)
L'émetteur lit les valeurs du joystick analogique et les envoie au récepteur via ESP-NOW. Les valeurs X et Y sont stockées dans une structure de données et envoyées au récepteur à intervalles réguliers, dans cet exemple toutes les 50 millisecondes.

```
#include <ESP8266WiFi.h>
#include <espnow.h>

// Remplacer par l'adresse MAC du récepteur ESP8266
uint8_t broadcastAddress[] = {0x08, 0xF9, 0xE0, 0x73, 0xDD, 0xF9};

struct struct_message {
  int Xval;
  int Yval;
} myData;

void setup() {
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);

  if (esp_now_init() != 0) {
    Serial.println("Error initializing ESP-NOW");
    return;
  }
  
  esp_now_set_self_role(ESP_NOW_ROLE_CONTROLLER);
  esp_now_add_peer(broadcastAddress, ESP_NOW_ROLE_SLAVE, 1, NULL, 0);
  
  // Configuration des pins pour la lecture du joystick
  pinMode(D4, OUTPUT); // Activer l'axe X
  pinMode(D3, OUTPUT); // Activer l'axe Y
}
 
void loop() {
  // Lecture et envoi des valeurs du joystick
  digitalWrite(D4, HIGH);
  myData.Xval = analogRead(A0);
  digitalWrite(D4, LOW);
  
  digitalWrite(D3, HIGH);
  myData.Yval = analogRead(A0);
  digitalWrite(D3, LOW);

  esp_now_send(broadcastAddress, (uint8_t *)&myData, sizeof(myData));
  delay(50);
}
```

## Configuration du récepteur ESP8266 (avec le fichier car.ino)
Le récepteur utilise les valeurs X et Y reçues pour contrôler les moteurs  via un pont H et ajuste la position d'un servomoteur.

```
#include <ESP8266WiFi.h>
#include <espnow.h>
#include <Servo.h>

struct struct_message {
  int Xval;
  int Yval;
} myData;

Servo myservo;
const int motor1PWM = D1, motor1DIR = D2, motor2PWM = D3, motor2DIR = D4;

void controlMotors(int x, int y) {
  // Logique de contrôle des moteurs et du servomoteur
  // (voir ci-dessous pour les détails)
}

void OnDataRecv(uint8_t* mac, uint8_t* incomingData, uint8_t len) {
  memcpy(&myData, incomingData, sizeof(myData));
  controlMotors(myData.Xval, myData.Yval);
  
  int servoPos = map(myData.Xval, 0, 1023, 0, 180);
  myservo.write(servoPos);
}

void setup() {
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  if (esp_now_init() != 0) {
    Serial.println("Error initializing ESP-NOW");
    return;
  }
  esp_now_set_self_role(ESP_NOW_ROLE_SLAVE);
  esp_now_register_recv_cb(OnDataRecv);
  
  pinMode(motor1PWM, OUTPUT);
  pinMode(motor1DIR, OUTPUT);
  pinMode(motor2PWM, OUTPUT);
  pinMode(motor2DIR, OUTPUT);
  myservo.attach(12); // Pin pour le servomoteur
}

void loop() {
  
}
```

## Logique de contrôle des moteurs
Dans la fonction controlMotors(int x, int y), vous devrez implémenter la logique pour convertir les valeurs x et y en signaux de contrôle pour les moteurs  et le servo moteur. La conversion typique implique de mapper la plage des valeurs du joystick (0 à 1023) à une plage utilisable pour le contrôle de vitesse des moteurs (par exemple, 0 à 255 pour analogWrite) et à la plage de rotation du servo moteur (0 à 180 degrés).

## montage electronique

![Exemple d'image](assets/IMG_2670.png)

Le montage électronique pour ce projet utilise un ESP8266 comme cerveau central pour contrôler deux moteurs  via un module de pont H et un servomoteur pour les commandes directionnelles.

### Schéma de Connexion

#### Alimentation:

La pile 9V est connectée au régulateur de tension L7805.
Le L7805 réduit la tension à 5V, qui alimente l'ESP8266 et le pont H.
#### Contrôle des Moteurs :

Les moteurs sont connectés aux sorties du module de pont H (L298N).
Les broches motor1PWM et motor2PWM de l'ESP8266 sont connectées aux entrées de commande PWM du pont H pour la vitesse des moteurs.
Les broches motor1DIR et motor2DIR sont utilisées pour contrôler la direction de rotation des moteurs.

#### Servomoteur:
Le servomoteur est contrôlé par une broche spécifique (indiquée comme D...) sur l'ESP8266.
### Procédure de Montage
#### 1.Montage du Pont H:

Connectez l'entrée d'alimentation du module de pont H au régulateur de tension L7805.
Raccordez les sorties du pont H aux moteurs.
#### 2.Connexion des Moteurs à l'ESP8266:

Branchez les broches de contrôle de vitesse et de direction (PWM et DIR) aux entrées correspondantes sur le module de pont H.
#### 3. Configuration du Servomoteur:

- Attachez le servomoteur à la broche définie sur l'ESP8266.
- Assurez-vous que le servomoteur est alimenté correctement et dispose d'une masse commune avec l'ESP8266.

#### 4.Connexion de l'ESP8266:

- Alimentez l'ESP8266 à partir du régulateur de tension L7805.
- Configurez l'ESP8266 avec le code nécessaire pour implémenter le protocole ESP-NOW et la logique de contrôle des moteurs.

### Considérations de Sécurité
- Assurez-vous que toutes les connexions sont bien isolées pour éviter tout court-circuit.
- Confirmez que la source d'alimentation est capable de fournir le courant nécessaire pour les moteurs sans surchauffer ou sans dépasser les limites de tension des composants.

## Photos du montage electronique (en cours de montage)

![Exemple d'image](assets/photo.png)