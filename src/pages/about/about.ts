import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { BarcodeScanner } from '@ionic-native/barcode-scanner';
import { Toast } from '@ionic-native/toast';
import { AlertController } from 'ionic-angular';
import * as $ from 'jquery';


@Component({
  selector: 'page-about',
  templateUrl: 'about.html'
})
export class AboutPage {
  products: any[] = [];
  jsonData;
  selectedProduct: any;
  productFound:boolean = false;

  constructor(
    public navCtrl: NavController,
    private barcodeScanner: BarcodeScanner,
    private toast: Toast,
    public alertCtrl: AlertController) {

  }

scan(){
this.selectedProduct = {};
  this.barcodeScanner.scan().then((barcodeData) => {
    //this.selectedProduct = this.products.find(product => product == barcodeData.text);
    if(this.selectedProduct != undefined) {
      this.productFound = true;
      this.selectedProduct = barcodeData.text;
      this.jsonData = JSON.parse(this.selectedProduct);
      this.alert(this.jsonData);
      this.alert(barcodeData.text);
    } else {
      this.productFound = false;
      this.toast.show(`Product not found`, '5000', 'center').subscribe(
        toast => {
          console.log(toast);
        }
      );
    }
  }, (err) => {
    this.toast.show(err, '5000', 'center').subscribe(
      toast => {
        console.log(toast);
      }
    );
  });
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

}
