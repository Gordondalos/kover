import {Injectable} from '@angular/core';
import {Select2OptionData} from 'ng2-select2/ng2-select2';

@Injectable()
export class DataService {

    phon: any = [];
    setComplexList(phones: any){
        this.phon = phones;
    }

    getComplexList(): Select2OptionData[] {

        return this.phon;

    }
}
