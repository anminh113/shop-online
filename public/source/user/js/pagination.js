

var itemSelector = ".product_item";
var $checkboxes = $('#accordion input');
var $container = $('.product_grid').isotope({ itemSelector: itemSelector });

//Ascending order
var responsiveIsotope = [ [480, 4] , [720, 6] ];
var itemsPerPageDefault = 2;
var itemsPerPage = defineItemsPerPage();
var currentNumberPages = 1;
var currentPage = 1;
var currentFilter = '*';
var filterAttribute = 'data-filter';
var filterValue = "";
var pageAttribute = 'data-page';

// update items based on current filters
function changeFilter(selector) { $container.isotope({ filter: selector }); }

//grab all checked filters and goto page on fresh isotope output
function goToPage(n) {
    currentPage = n;
    var selector = itemSelector;
    var exclusives = [];
    // for each box checked, add its value and push to array
    $checkboxes.each(function (i, elem) {
        if (elem.checked) {
            selector += ( currentFilter != '*' ) ? '.'+elem.value : '';
            exclusives.push(selector);
        }
        $('.page_nav li').removeClass('active');
        $('#'+n+'').addClass('active');
    });
    // smash all values back together for 'and' filtering
    filterValue = exclusives.length ? exclusives.join('') : '*';
    // add page number to the string of filters
    var wordPage = currentPage.toString();
    filterValue += ('.'+wordPage);
    changeFilter(filterValue);


}

// determine page breaks based on window width and preset values
function defineItemsPerPage() {
    var pages = itemsPerPageDefault;
    for( var i = 0; i < responsiveIsotope.length; i++ ) {
        if( $(window).width() <= responsiveIsotope[i][0] ) {
            pages = responsiveIsotope[i][1];
            break;
        }
    }
    return pages;
}

function setPagination() {

    var SettingsPagesOnItems = function(){
        var itemsLength = $container.children(itemSelector).length;
        var pages = Math.ceil(itemsLength / itemsPerPage);
        var item = 0;
        var page = 1;
        var selector = itemSelector;
        var exclusives = [];
        // for each box checked, add its value and push to array
        $checkboxes.each(function (i, elem) {
            if (elem.checked) {
                selector += ( currentFilter != '*' ) ? '.'+elem.value : '';
                exclusives.push(selector);
            }
        });
        // smash all values back together for 'and' filtering
        filterValue = exclusives.length ? exclusives.join('') : '*';
        // find each child element with current filter values
        $container.children(filterValue).each(function(){
            // increment page if a new one is needed
            if( item > itemsPerPage ) {
                page++;
                item = 1;
            }
            // add page number to element as a class
            wordPage = page.toString();
            var classes = $(this).attr('class').split(' ');

            var lastClass = classes[classes.length-1];
            // last class shorter than 4 will be a page number, if so, grab and replace
            if(lastClass.length < 4){
                $(this).removeClass();
                classes.pop();
                classes.push(wordPage);
                classes = classes.join(' ');
                $(this).addClass(classes);
            } else {
                $(this).addClass(wordPage);
            }
            item++;
        });
        currentNumberPages = page;
    }();

    // create page number navigation
    var CreatePagers = function() {
        if(currentNumberPages > 1){

            for( var i = 0; i < currentNumberPages; i++ ) {
                $( '.test'+(i+1)+'' ).remove();
                var $pager1 = $('<li id="'+(i+1)+'"  class="test'+(i+1)+'" ></li>') ;
                var $pager = $('<a  href="javascript:void(0);" '+pageAttribute+'="'+(i+1)+'"></a>') ;
                $pager.html(i+1);
                $pager.click(function(){
                    var page = $(this).eq(0).attr(pageAttribute);
                    console.log(page);
                    goToPage(page);
                });
                $( '#test' ).append($pager1);
                $( '.test'+(i+1)+'' ).append($pager);

                var j = 1;
                var test = 0;
                var $pagernext = $('<a  href="javascript:void(0);" '+pageAttribute+'="'+2+'"><i class="fas fa-chevron-right"></i></a>') ;
                $pagernext.click(function(){
                    if(test < currentNumberPages){
                        test +=(j);
                        console.log(test);
                        goToPage(test);
                    }
                });
                $( '#testnext' ).html($pagernext);


                var $pagerPrevious = $('<a  href="javascript:void(0);" '+pageAttribute+'="'+2+'"><i class="fas fa-chevron-left"></i></a>') ;
                $pagerPrevious.click(function(){
                    if(test > 1){
                        test -=(j);
                        console.log(test);
                        goToPage(test);
                    }
                });
                $( '#Previous' ).html($pagerPrevious);
            }

        }
    }();
}
// remove checks from all boxes and refilter
function clearAll(){
    $checkboxes.each(function (i, elem) {
        if (elem.checked) {
            elem.checked = null;
        }
    });
    currentFilter = '*';
    setPagination();
    goToPage(1);
}

setPagination();
goToPage(1);

//event handlers
$checkboxes.change(function(){
    var filter = $(this).attr(filterAttribute);
    currentFilter = filter;
    setPagination();
    goToPage(1);
});

$('#clear-filters').click(function(){clearAll()});

$(window).resize(function(){
    itemsPerPage = defineItemsPerPage();
    setPagination();
    goToPage(1);
});
