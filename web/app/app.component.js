"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var data_service_1 = require('./data.service');
// import { Select2Component } from 'ng2-select2/ng2-select2';
var AppComponent = (function () {
    function AppComponent(dataServices) {
        this.dataServices = dataServices;
        this.selected = "";
        // function for result template
        this.templateResult = function (state) {
            if (!state.id) {
                return state.text;
            }
            var image = '<span class="image"></span>';
            if (state.additional.image) {
                image = '<span class="image"><img src="' + state.additional.image + '"</span>';
            }
            return $('<span><b>' + state.additional.winner + '.</b> ' + image + ' ' + state.text + '</span>');
        };
        // function for selection tempalte
        this.templateSelection = function (state) {
            if (!state.id) {
                return state.text;
            }
            return $('<span><b>' + state.additional.winner + '.</b> ' + state.text + '</span>');
        };
    }
    AppComponent.prototype.changed = function (e) {
        this.selected = e.value;
    };
    AppComponent.prototype.ngOnInit = function () {
        var phones = JSON.parse($('.phones').val());
        // console.log(phones);
        var phone_arr = [];
        phones.forEach(function (phone, index) {
            phone_arr[index] = [];
            phone_arr[index]['id'] = phone.client_id;
            phone_arr[index]['text'] = phone.phone;
        });
        this.dataServices.setComplexList(phone_arr);
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'my-app',
            templateUrl: '/app/angular_view/app_view/app.component.view.html',
            providers: [data_service_1.DataService]
        }), 
        __metadata('design:paramtypes', [data_service_1.DataService])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map