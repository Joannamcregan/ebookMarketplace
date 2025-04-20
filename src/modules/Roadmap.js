import $ from 'jquery';

class Roadmap {
    constructor() {
        this.sellBooksSpan = $("#sellBooksSpan");
        this.sellProductsSection = $("#sellProductsSection");
        this.sellServicesSpan = $("#sellServicesSpan");
        this.sellServicesSection = ("#sellServicesSection");
        this.sellEbooksSpan = $("#sellEbooksSpan");
        this.sellEbooksSection = $("#sellEbooksSection");
        this.sellAudiobooksSpan = $("#sellAudiobooksSpan");
        this.sellAudiobooksSection = $("#sellAudiobooksSection");
        this.sellPhysicalBooksSpan = $("#sellPhysicalBooksSpan");
        this.sellPhysicalBooksSection = $("#sellPhysicalBooksSection");
        this.events();
    }

    events(){
        this.sellBooksSpan.on('click', () => {
            this.sellBooksSpan.toggleClass('roadmap--purple-span');
            this.sellBooksSpan.toggleClass('roadmap--hollow-purple-span');
            this.sellProductsSection.toggleClass('hidden');
        });
        this.sellServicesSpan.on('click', ()=> {
            this.sellServicesSpan.toggleClass('roadmap--blue-span');
            this.sellServicesSpan.toggleClass('roadmap--hollow-blue-span');
            this.sellServicesSection.toggleClass('hidden');
        });
        this.sellEbooksSpan.on('click', ()=>{
            this.sellEbooksSpan.toggleClass('roadmap--blue-span');
            this.sellEbooksSpan.toggleClass('roadmap--hollow-blue-span');
            this.sellEbooksSection.toggleClass('hidden');
        });
        this.sellAudiobooksSpan.on('click', ()=>{
            this.sellAudiobooksSpan.toggleClass('roadmap--purple-span');
            this.sellAudiobooksSpan.toggleClass('roadmap--hollow-purple-span');
            this.sellAudiobooksSection.toggleClass('hidden');
        });
        this.sellPhysicalBooksSpan.on('click', ()=>{
            this.sellPhysicalBooksSpan.toggleClass('roadmap--orange-span');
            this.sellPhysicalBooksSpan.toggleClass('roadmap--hollow-orange-span');
            this.sellPhysicalBooksSection.toggleClass('hidden');
        });
    }

}

export default Roadmap;