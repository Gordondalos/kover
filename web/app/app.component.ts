import { Component, OnInit } from '@angular/core';

import { DataService } from './data.service';
// import { Select2Component } from 'ng2-select2/ng2-select2';


@Component({
    selector: 'my-app',
    templateUrl: '/app/angular_view/app_view/app.component.view.html',
    providers: [DataService]

})


export class AppComponent implements OnInit{

    private startValue: string = 'car3';
    private selected: string ="";

    constructor(private data: DataService) { }

    // function for result template
    public templateResult: Select2TemplateFunction = (state: Select2OptionData): JQuery | string => {
        if (!state.id) {
            return state.text;
        }

        let image = '<span class="image"></span>';

        if (state.additional.image) {
            image = '<span class="image"><img src="' + state.additional.image + '"</span>';
        }

        return $('<span><b>' + state.additional.winner + '.</b> ' + image + ' ' + state.text + '</span>');
    }

    // function for selection tempalte
    public templateSelection: Select2TemplateFunction = (state: Select2OptionData): JQuery | string => {
        if (!state.id) {
            return state.text;
        }

        return jQuery('<span><b>' + state.additional.winner + '.</b> ' + state.text + '</span>');
    }

    public changed(e: Object): void {
        this.selected = e.value;
    }


    phones: any;

    ngOnInit(){
       this.phones = JSON.parse($('.phones').val());
       console.log(this.phones);

    }

}
