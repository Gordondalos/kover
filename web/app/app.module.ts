import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent }   from './app.component';
import { Select2Component } from 'ng2-select2/ng2-select2';




@NgModule({
    imports:      [ BrowserModule ],
    declarations: [ AppComponent, Select2Component ],
    bootstrap:    [ AppComponent ]
})
export class AppModule { }
