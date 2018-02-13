import { HttpClient } from '@angular/common/http';
import { Http } from '@angular/http';
import { Injectable } from '@angular/core';

/*
  Generated class for the BuyerServiceProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class BuyerServiceProvider {

  constructor(private http:Http) {}
    listar() {
      return this.http.get('http://arcoiris.x10host.com/backend/config/crud.php?opcion=1');
    }
    detallar(id: number) {
      return this.http.get('http://localhost/myCRUD/src/api/productos.php?opcion=2&id=' + id);
    }
    guardar(item: Object) {
      return this.http.post('http://localhost/myCRUD/src/api/productos.php?opcion=3', item);
    }
    modificar(item: Object) {
      return this.http.post('http://localhost/myCRUD/src/api/productos.php?opcion=4', item);
    }
    eliminar(id: number) {
      return this.http.get('http://localhost/myCRUD/src/api/productos.php?opcion=5&id=' + id);
  }

}
