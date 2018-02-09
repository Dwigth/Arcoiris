import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import "rxjs/add/operator/map";
import { BuyerServiceProvider } from '../../providers/buyer-service/buyer-service';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  listado;
  compradores:any[];
  constructor(public navCtrl: NavController, private crud:BuyerServiceProvider) {

    this.listarproductos();

  }

  listarproductos(){
    //this.slim.stop();
    this.crud.listar()
    .map((response) => response.json())
    .subscribe((data) => {
      this.listado = data;
      this.compradores = this.listado;
      console.log(this.listado);
      //this.slim.complete();
    });
}

}
