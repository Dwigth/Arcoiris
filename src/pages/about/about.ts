import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { QRScanner, QRScannerStatus } from '@ionic-native/qr-scanner';
import { AlertController } from 'ionic-angular';
<<<<<<< HEAD
=======
import * as $ from 'jquery';
>>>>>>> master

@Component({
  selector: 'page-about',
  templateUrl: 'about.html'
})
export class AboutPage {

  constructor(
    public navCtrl: NavController,
    private qrScanner: QRScanner,
    public alertCtrl: AlertController) {

  }

  setCamera(){

    this.qrScanner.prepare()
  .then((status: QRScannerStatus) => {
    this.alert(status.authorized)
     if (status.authorized) {
       // camera permission was granted
<<<<<<< HEAD
       this.qrScanner.useCamera(0);

       // start scanning
       let scanSub = this.qrScanner.scan().subscribe((text: string) => {
         console.log('Scanned something', text);
         this.alert('Scanned something')

         //this.qrScanner.hide(); // hide camera preview
         //scanSub.unsubscribe(); // stop scanning
       });
=======
       // start scanning
       /*let scanSub = this.qrScanner.scan().subscribe((text: string) => {
         console.log('Scanned something', text);


         //this.qrScanner.hide(); // hide camera preview
         //scanSub.unsubscribe(); // stop scanning
       });*/
>>>>>>> master

       // show camera preview
       this.qrScanner.show();

       // wait for user to scan something, then the observable callback will be called

     } else if (status.denied) {
       // camera permission was permanently denied
       // you must use QRScanner.openSettings() method to guide the user to the settings page
       // then they can grant the permission from there
     } else {
       // permission was denied, but not permanently. You can ask for permission again at a later time.
     }
  })
  .catch((e: any) => console.log('Error is', e));
  }

  alert(message){
    let confirm = this.alertCtrl.create({
      title: 'Alert',
      message: message,
      buttons: [
        {
          text: 'Disagree',
          handler: () => {
            console.log('Disagree clicked');
          }
        },
        {
          text: 'Agree',
          handler: () => {
            console.log('Agree clicked');
          }
        }
      ]
    });
    confirm.present();
  }

<<<<<<< HEAD
=======


>>>>>>> master
}
