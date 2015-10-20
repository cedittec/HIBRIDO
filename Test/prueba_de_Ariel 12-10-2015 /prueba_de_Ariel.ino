#include <SPI.h>
#include <Ethernet.h>

//byte mac[] = {   0x00, 0x12, 0x3F, 0x7C, 0x25, 0xAB };
byte mac[] = {    0x00, 0xAA, 0xBB, 0xCC, 0xDA, 0x02  };
byte server[] = { 74, 124, 24, 190};
//byte server[] = { 10, 49, 130, 37};

// Set the static IP address to use if the DHCP fails to assign
//IPAddress ip(10,49,130,37);

EthernetClient client;
void setup() {
  Serial.begin(9600);
  Serial.println("Start");
  while (!Serial) 
  {
    ; // wait for serial port to connect. Needed for Leonardo only
  }
  Serial.println("Iniciando el arduino");
  if (Ethernet.begin(mac) == 0){
    Serial.println("Imposible conectarse a la red");
    setup(); 
  }
  Serial.println("Connectado a la red como");
  Serial.println(Ethernet.localIP());

}

void loop()
{
  Serial.println("Loop \nIP:");
  Serial.println(Ethernet.localIP());
  // if there are incoming bytes available 
  // from the server, read them and print them:
  if (client.connected()> 0)
  {
    Serial.println("Ya se habia conectado al server ");
    // Make a HTTP request:
    client.println("GET /ems/modhib/hibrido_solar2.php");
    //client.println("Host: www.google.com");
    client.println("Connection: close");
    client.println();
    
     client.flush();
     client.stop();
   
  }
  else
  if (client.connect(server, 80)) 
  {
    Serial.println("conectado al  server ");
    // Make a HTTP request:
    client.println("GET /ems/modhib/hibrido_solar2.php");
    //client.println("Host: www.google.com");
    client.println("Connection: close");
    client.println(); 
     client.flush();
     client.stop();
   
  } 
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
    setup();
  }
  
  delay(10000);
  setup();
}
  
