import $ from 'jquery';

class ValuesDisplay {
    constructor() {
        this.valuesOverlay = $('#tomc-values-overlay');
        this.closeButton = $(".values-overlay__close");
        this.events();
    }

    events(){
        this.closeButton.on("click", this.closeOverlay.bind(this));
    }

    closeOverlay(){
        this.valuesOverlay.addClass('hidden');
        this.valuesOverlay.removeClass('tomc-values-overlay');
    }
}

export default ValuesDisplay;