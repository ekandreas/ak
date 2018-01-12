# Akademikliniken

## Utvecklingsmiljö
Vagrantmiljö för Akademikliniken. Följande krav innan installation:
* VirtualBox
* Git
* Vagrant (med plugins)

För att skapa en ny utvecklingsmiljö:
1. Klona repot till lokal mapp för utveckling.
2. Gå in i mappen och kör `vagrant up`, vänta på uppstart.
3. Säkerställ att din hosts pekar mot lokal vagrantmaskin och öppna i webbläsare.
4. Acceptera self signed Cert i ditt OS.

https://akademikliniken.local och https://eng.akademikliniken.local ska nu finnas.
WordPress når du som vanligt via /wp-admin (adressen /wp/wp-admin är omskriven med nginx-regler).
