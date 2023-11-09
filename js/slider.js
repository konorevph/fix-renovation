(function(){

    var doc = document,
        index = 1;

    var Slider = function() {
        this.box = doc.querySelector('.carousel-container');
        this.slideBox = doc.querySelector('.carousel-slides');
        this.slides = doc.querySelectorAll('.carousel-slides li');
        this.btns = doc.querySelectorAll('.next-prev-btns button');
        this.size = this.box.clientWidth;

        this.position();
        this.carousel();
    }

    Slider.prototype.position = function () {
        var slides = this.slides;
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.left = (100 * i) +'%';
        }
        var size = this.size;
        this.slideBox.style.transform = 'translateX(' + (-index * size) + 'px)';
    }

    Slider.prototype.carousel = function () {
        var i, max = this.btns.length,
            that = this;
        
        for(i = 0; i < max; i++) {
            that.btns[i].addEventListener('click', Slider[that.btns[i].id].bind(null, that));
        }
    }

    Slider.next = function(box) {
        box.slideBox.style.transition = "transform .3s ease-in-out";
        var max = box.slides.length;
        var size = box.size;
        index >= max - 1 ? false : index++;
        box.slideBox.style.transform = 'translateX(' + (-index * size) + 'px)';
        box.jump();
    };

    Slider.prev = function(box) {
        box.slideBox.style.transition = "transform .3s ease-in-out";
        var size = box.size;
        index <= 0 ? false : index--;
        box.slideBox.style.transform = 'translateX(' + (-index * size) + 'px)';
    };

    Slider.prototype.jump = function() {
        var that = this;
        var size = this.size;
        this.slideBox.addEventListener('transitionend', function() {
            that.slides[index].id === "firstClone" ? index = 1 : index;
            that.slides[index].id === "lastClone" ? index = that.slides.length - 2 : index;

            that.slideBox.style.transition = "none";
            that.slideBox.style.transform = 'translateX(' + (-index * size) + 'px)';
        });
    }


    new Slider();

})();