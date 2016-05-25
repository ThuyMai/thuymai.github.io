(function($){
    $(document).ready(function(){
        var colorThief = new ColorThief();
        var sections = $('.section');
        sections.each(function(){
            var section = $(this);
            var img = section.find("img");
            var div = $('<div id="colorList"></div>')
            section.append(div);
            var colorList = section.find("#colorList");

            
            img[0].onload = function(){
                var mainColor = colorThief.getColor(img[0]);

                var color = "rgb("+mainColor[0] + "," + mainColor[1] + "," + mainColor[2] + ")";
                img.parent().css("background-color",color);

                var palette = colorThief.getPalette(img[0], 10);
                for(var index = 0; index < palette.length; index++){
                    var color = "rgb("+palette[index][0] + "," + palette[index][1] + "," + palette[index][2] + ")";
                    colorList.append("<span class='color-block' style = 'background:"+color+"'></span>")
                }
            }
            img.attr("src", img.data("src"));
        });
    });
})(jQuery);