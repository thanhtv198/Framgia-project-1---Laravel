//hover image
$(document).ready(function () {
    $('.image-bot-container>img').hover(function () {
        $('.image-top>img').attr('src', $(this).attr('src'));
        $(this).css("border", "1px solid whitesmoke");
    });
});
// add-cart
$(document).ready(function () {
    $('.product-icon-container').find('a').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                alert('Add to cart success');
            }
        });

        return false; //for good measure
    });
});

function addToCart() {
    var a = document.getElementById("count_cart").innerText;
    var b = parseInt(a) + 1;
    document.getElementById("count_cart").innerHTML = b;
}
// add-compare
$(document).ready(function () {
    $('.compare_count').find('a').click(function (event) {
        event.preventDefault();
        var a = document.getElementById("count_compare").innerText;
        if(a >= 2){
            alert('Can\'t compare over 2 produts');
            return false;
        }
        $.ajax({
            url: $(this).attr('href'),
            success: function (data) {
                console.log(data)
                if(data && data == 1){
                    document.getElementById("count_compare").innerHTML = 1;
                    alert(('Product have been exists in compare!'));
                    return false;
                }
                // document.getElementById("count_compare").innerHTML = 2;
                alert(('Add to compare!'));
            }
        });

        var b = parseInt(a) + 1;
        document.getElementById("count_compare").innerHTML = b;
        return false; //for good measure
    });
});
// delete
$(document).ready(function () {
    $('.delete').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function () {
            }
        });
        return false;
    });
});
//delete cart
function deleteRow(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    console.log(a);
    var b = document.getElementById("cart_table").deleteRow(a);
    var total = document.getElementById("count_cart").innerText;
    var sub = x.parentNode.parentNode.parentNode.children[1].children[0].value;
    document.getElementById("count_cart").innerHTML = total - sub;
}

//delete sold
function deleteSold(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    // console.log(a);
    var b = document.getElementById("cart_table").deleteRow(a);
}

// delete sell
function deleteSell(x) {
    var a = x.parentNode.parentNode.parentNode.rowIndex - 1;
    var b = document.getElementById("cart_table").deleteRow(a);
}

// search
function autoComplete() {
    var x = document.getElementById("tags");
    var url = $('#url').val();
    var key = x.value;
    console.log(x);
    console.log(url);
    $.ajax({
        type:'get',
        url: url + 'searchx',
        data:{key:key},
        success: function(data){
            $( "#tags" ).autocomplete({
                source: data
            });
        }
    });
}

//search name
$(document).ready(function () {
    $('.search_name').click(function(){
        var url = $('#url').val();
        var key1 = ($('#tags').val());
        var key = key1.replace( "/", '__');
//            alert(key);
        window.location.href = url + 'search' + '/' + key;
    });
});

//search address
$(document).ready(function () {
    $('.btn-address').click(function(){
        var url = $('#url').val();
        var id = $('.address1').val();
        window.location.href = url + 'address' + '/' + id;
    });
});
//search price
$(document).ready(function () {
    $('.search_price').click(function(){
        var url = $('#url').val();
        var from = $('#from').val();
        var to = $('#to').val();
        // alert(from);
        if(!to && from){
            window.location.href = url + 'price' + '/' + from;
        }else if(!from && to){
            window.location.href = url + 'price'  + '/to' + to;
        }else{
            window.location.href = url + 'price'  + '/' + from + '/' + to;
        }
    });
});

//add product
$(document).ready(function () {
    $('.plus-custom').click(function () {
        $('#custom-prop').show();
    });
});
