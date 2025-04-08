import $ from 'jquery';

class CheckoutDisplay{
    constructor(){
        this.zipCode = $('#billing_postcode');
        this.billingCounty = $('#billing_county');
        this.countyField = $('#billing_county_field');
        this.events();
    }
    events(){             
        this.zipCode.on('change', this.populate.bind(this));
    }
    populate(){
        if (this.zipCode.val().trim() == '43068'){
            this.billingCounty.html('');
            let option = $('<option/>').val('franklin_ohio').html('Franklin');
            this.billingCounty.append(option);
            option = $('<option/>').val('fairfield_ohio').html('Fairfield');
            this.billingCounty.append(option);
            option = $('<option/>').val('licking_ohio').html('Licking');
            this.billingCounty.append(option);
            this.countyField.removeClass('hidden');
        } else if (this.zipCode.val().trim() == '43064') {
            this.billingCounty.html('');
            let option = $('<option/>').val('madison_ohio').html('Madison');
            this.billingCounty.append(option);
            option = $('<option/>').val('delaware_ohio').html('Delaware');
            this.billingCounty.append(option);
            option = $('<option/>').val('franklin_ohio').html('Franklin');
            this.billingCounty.append(option);
            option = $('<option/>').val('union_ohio').html('Union');
            this.billingCounty.append(option);
            this.countyField.removeClass('hidden');
        } else {
            this.billingCounty.html('');
            let option = $('<option/>').val('default').html('N/A');
            this.billingCounty.append(option);
            this.countyField.addClass('hidden');
        }
    }
}

export default CheckoutDisplay;