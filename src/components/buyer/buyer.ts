import { Component } from '@angular/core';

/**
 * Generated class for the BuyerComponent component.
 *
 * See https://angular.io/api/core/Component for more info on Angular
 * Components.
 */
@Component({
  selector: 'buyer',
  templateUrl: 'buyer.html'
})
export class BuyerComponent {

  text: string;

  constructor() {
    console.log('Hello BuyerComponent Component');
    this.text = 'Hello World';
  }

}
