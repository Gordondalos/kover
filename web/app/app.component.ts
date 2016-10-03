import { Component, OnInit } from '@angular/core';


@Component({
    selector: 'my-app',
    templateUrl: '/app/angular_view/app_view/app.component.view.html'
})


export class AppComponent implements OnInit{

    phone: string;


    ngOnInit(){
        this.phone = phones;
        console.log(this.phone);
    }

}
