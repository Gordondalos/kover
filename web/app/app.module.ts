import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent }   from './app.component';
import { HttpModule }    from '@angular/http';
import { FormsModule }   from '@angular/forms';
import {ReactiveFormsModule} from '@angular/forms';
import {SelectModule} from 'angular2-select';



@NgModule ( {
    imports : [ BrowserModule,
        HttpModule,
        FormsModule,
        ReactiveFormsModule,
        SelectModule

    ],
    declarations : [
        AppComponent,

    ],

    bootstrap : [ AppComponent ]
} )
export class AppModule {
}
