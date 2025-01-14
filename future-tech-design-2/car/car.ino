#include <ESP8266WiFi.h>
#include <espnow.h>
#include <Servo.h>

typedef struct struct_message {
  int Xval;
  int Yval;
} struct_message;

typedef struct x_y {
  int x = 0;
  int y = 0;
  bool init = false;
} x_y;

x_y offsets;

struct_message myData;

const int motor1PWM = D1;
const int motor1DIR = D2;
const int motor2PWM = D3;
const int motor2DIR = D4;

Servo myservo;

void controlMotors(int x, int y) {
  // Normaliser et centrer les valeurs du joystick
  if(!offsets.init) {
    offsets.x = x;
    offsets.y = y;
    offsets.init = true;
  }

  x = (x - offsets.x) / 2;
  y = (y - offsets.y) / 2;
  
  
  Serial.print("x: ");
  Serial.println(x);
  Serial.print("y: ");
  Serial.println(y);
  if (y < 0) {
    // Moteur 1
    analogWrite(motor1DIR, 0);
    analogWrite(motor1PWM, abs(y) + x);

    // Moteur 2
    analogWrite(motor2DIR, 0);
    analogWrite(motor2PWM, abs(y) - x);

  } else {

    // Moteur 1
    analogWrite(motor1DIR, y + x);
    analogWrite(motor1PWM, 0);

    // Moteur 2
    analogWrite(motor2DIR, y - x);
    analogWrite(motor2PWM, 0);
  }
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
  myservo.attach(12);
}

void loop() {

}

