#include <ESP8266WiFi.h>
#include <espnow.h>

//car esp mac adress
uint8_t broadcastAddress[] = {0x08, 0xF9, 0xE0, 0x73, 0xDD, 0xF9};

typedef struct struct_message {
  int Xval;
  int Yval;
} struct_message;

struct_message myData;

unsigned long lastTime = 0;  
unsigned long timerDelay = 2000; 

void OnDataSent(uint8_t *mac_addr, uint8_t sendStatus) {
  Serial.print("Last Packet Send Status: ");
  if (sendStatus == 0){
    Serial.println("Delivery success");
  }
  else{
    Serial.println("Delivery fail");
  }
}
 
void setup() {
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  
  if (esp_now_init() != 0) {
    Serial.println("Error initializing ESP-NOW");
    return;
  }
  
  esp_now_set_self_role(ESP_NOW_ROLE_CONTROLLER);
  esp_now_register_send_cb(OnDataSent);
  esp_now_add_peer(broadcastAddress, ESP_NOW_ROLE_SLAVE, 1, NULL, 0);
  
  pinMode(D4, OUTPUT);
  pinMode(D3, OUTPUT);
}
 
void loop() {
    digitalWrite(D4, HIGH);
    digitalWrite(D3, LOW);
    myData.Xval = analogRead(A0);
    digitalWrite(D4, LOW);
    
    digitalWrite(D3, HIGH);
    myData.Yval = analogRead(A0);
    digitalWrite(D3, LOW);

    esp_now_send(broadcastAddress, (uint8_t *) &myData, sizeof(myData));
    
    lastTime = millis();
  delay(50);
}