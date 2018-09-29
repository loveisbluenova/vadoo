// Animate the element's value from x to y:
               $({someValue: 0}).animate({someValue: <?php echo $countvisits; ?>}, {
               duration: 2500,
               easing:'swing', // can be anything
               step: function() { // called on every step
               // Update the element's text with rounded-up value:
               $('.total-visits').text(commaSeparateNumber(Math.round(this.someValue)));
               }
               });

               function commaSeparateNumber(val){
               while (/(\d+)(\d{3})/.test(val.toString())){
               val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
               }
               return val;
               }
               // Animate the element's value from x to y:
               $({someValue: 0}).animate({someValue: <?php echo $countuniquevisits; ?>}, {
               duration: 2500,
               easing:'swing', // can be anything
               step: function() { // called on every step
               // Update the element's text with rounded-up value:
               $('.total-unique-visits').text(commaSeparateNumber(Math.round(this.someValue)));
               }
            });

               function commaSeparateNumber(val){
               while (/(\d+)(\d{3})/.test(val.toString())){
               val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
             }
               return val;
             }