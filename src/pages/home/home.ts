import { Component,OnInit } from '@angular/core';
import { NavController } from 'ionic-angular';
import "rxjs/add/operator/map";
import { LoadingController } from 'ionic-angular';
import { BuyerServiceProvider } from '../../providers/buyer-service/buyer-service';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  tap;
  listado;
  compradores:any[];
  constructor(
    public navCtrl: NavController,
    private crud:BuyerServiceProvider,
    public loadingCtrl: LoadingController) { }

  ngOnInit(){
      this.listarproductos();
  }

  listarproductos(){
    //this.slim.stop();
    this.crud.listar()
    .map(
        (response) => response.json()
      ).subscribe(
        (data) => {
      this.listado = data;
      this.compradores = this.listado;
      console.log(this.listado);
      //this.slim.complete();
    });
}

tapEvent(ev:any){
  if (ev.isFinal) {
      this.presentLoading();
        this.listarproductos();
  }
}
presentLoading() {
    let loader = this.loadingCtrl.create({
      content: "Actualizando...",
      duration: 1000
    });
    loader.present();
  }

}
