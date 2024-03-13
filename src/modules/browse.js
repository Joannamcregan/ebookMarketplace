import $ from 'jquery';

class BrowseStuff{
    constructor(){
        this.anyLevel1 = true;
        this.anyLevel2 = true;
        this.anyLevel3 = true;
        this.selectedGenres1 = ['1', '2', '3'];
        this.selectedGenres2 = [];
        this.selectedGenres3 = [];
        this.genreOptions1 = $('.tomc-book-organization--browse-option-1');
        this.genreOptions2 = $('.tomc-book-organization--browse-option-2');
        this.genreOptions3 = $('.tomc-book-organization--browse-option-3');
        this.events();
    }
    events(){
        this.genreOptions1.on('click', this.toggleSelected1.bind(this));
        this.genreOptions2.on('click', this.toggleSelected2.bind(this));
        this.genreOptions3.on('click', this.toggleSelected3.bind(this));
    }
    toggleSelected2(e){
        console.log('in the beginning the selected genre 2s are ' + this.selectedGenres2 + ' and AnyGenre2 is ' + this.anyLevel2);
        if ($(e.target).hasClass('tomc-book-organization--browse-option-2-selected')){            
            this.anyLevel2 = false;
            $(e.target).removeClass('tomc-book-organization--browse-option-2-selected');
            if ($(e.target).data('genre-id') === 0){
                this.selectedGenres2 = [];
            } else {
                for (let i = 0; i < this.selectedGenres2.length; i++){
                    if (this.selectedGenres2[i] == $(e.target).data('genre-id')){
                        this.selectedGenres2.splice(i, 1);
                    }
                }
            }
            if (this.selectedGenres2.length === 0){
                $('#tomc-book-organization--browse-genres-2-error').removeClass('hidden');
            }
        } else {
            $('#tomc-book-organization--browse-genres-2-error').addClass('hidden');
            $(e.target).addClass('tomc-book-organization--browse-option-2-selected');
            if ($(e.target).data('genre-id') === 0){
                this.anyLevel2 = true;
                this.selectedGenres2 = [];
                $('.tomc-book-organization--browse-normal-2').each(function(){
                    $(this).removeClass('tomc-book-organization--browse-option-2-selected');
                })
            } else {
                $('#tomc-book-organization--browse-genre-any-2').removeClass('tomc-book-organization--browse-option-2-selected');
                this.anyLevel2 = false;
                $(e.target).addClass('tomc-book-organization--browse-option-2-selected');
                this.selectedGenres2.push($(e.target).data('genre-id'));
                if (this.selectedGenres2.length === $(e.target).parent('.tomc-book-organization--options-container').data('count')){
                    this.anyLevel2 = true;
                }
            }
        }
        console.log('at the end the selected genre 2s are ' + this.selectedGenres2 + ' and AnyGenre2 is ' + this.anyLevel2);
    }
    toggleSelected1(e){
        console.log('at the beginning, selected genre 1s are ' + this.selectedGenres1);
        if ($(e.target).hasClass('tomc-book-organization--browse-option-1-selected')){
            $(e.target).removeClass('tomc-book-organization--browse-option-1-selected');
            for (let i = 0; i < this.selectedGenres1.length; i++){
                if (this.selectedGenres1[i] == $(e.target).data('genre-id')){
                    this.selectedGenres1.splice(i, 1);
                }
            }
            if (this.selectedGenres1.length === 0){
                $('#tomc-book-organization--browse-genres-1-error').removeClass('hidden');
            }
        } else {
            $(e.target).addClass('tomc-book-organization--browse-option-1-selected');
            this.selectedGenres1.push($(e.target).data('genre-id'));
            $('#tomc-book-organization--browse-genres-1-error').addClass('hidden');
            if (this.selectedGenres1.length === 3){
                this.anyLevel1 = true;
            } else {
                this.anyLevel1 = false;
            }
        }
        console.log('at the end, selected genre 1s are ' + this.selectedGenres1);
    }
    toggleSelected3(e){
        console.log('in the beginning the selected genre 3s are ' + this.selectedGenres3 + ' and AnyGenre3 is ' + this.anyLevel3);
        if ($(e.target).hasClass('tomc-book-organization--browse-option-3-selected')){            
            this.anyLevel3 = false;
            $(e.target).removeClass('tomc-book-organization--browse-option-3-selected');
            if ($(e.target).data('genre-id') === 0){
                this.selectedGenres3 = [];
            } else {
                for (let i = 0; i < this.selectedGenres3.length; i++){
                    if (this.selectedGenres3[i] == $(e.target).data('genre-id')){
                        this.selectedGenres3.splice(i, 1);
                    }
                }
            }
            if (this.selectedGenres3.length === 0){
                $('#tomc-book-organization--browse-genres-3-error').removeClass('hidden');
            }
        } else {
            $('#tomc-book-organization--browse-genres-3-error').addClass('hidden');
            $(e.target).addClass('tomc-book-organization--browse-option-3-selected');
            if ($(e.target).data('genre-id') === 0){
                this.anyLevel3 = true;
                this.selectedGenres3 = [];
                $('.tomc-book-organization--browse-normal-3').each(function(){
                    $(this).removeClass('tomc-book-organization--browse-option-3-selected');
                })
            } else {
                $('#tomc-book-organization--browse-genre-any-3').removeClass('tomc-book-organization--browse-option-3-selected');
                this.anyLevel3 = false;
                $(e.target).addClass('tomc-book-organization--browse-option-3-selected');
                this.selectedGenres3.push($(e.target).data('genre-id'));
                if (this.selectedGenres3.length === $(e.target).parent('.tomc-book-organization--options-container').data('count')){
                    this.anyLevel3 = true;
                }
            }
        }
        console.log('at the end the selected genre 3s are ' + this.selectedGenres3 + ' and AnyGenre3 is ' + this.anyLevel3);
    }
}

export default BrowseStuff;