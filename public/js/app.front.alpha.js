$(document).ready(function () {
    try {
        $('.select2').select2();
    }
    catch (e) {

    }
    $('#srchbtn').click(On_SearchButtonClick);
});

function On_TopCityChanged() {
    $citySelect = $("#city_select").empty();
    $citySelect.append($('<option value="">Select District</option>'));
    // $serviceHolder = $("#service_holder").empty();
    var ar = $("#top_city_select option:selected").first().data('area');
    var arName = $("#top_city_select option:selected").first().data('area-name');
    var arid = $("#top_city_select option:selected").first().attr('value');
    //    //alert(ar);
    //    location.href=`/${ar}`;
    // if (arid)
    {
        fetch(__urls.GetCityPagesAjaxUrl(arid||'nah'), {
            method: 'POST',
            body: JSON.stringify({
                'alpha': 'Alpha-Con',
                _token: __urls._token,
                q:$("#q").val().trim()
            }),
            headers: {
                'X-CSRF-TOKEN': __urls._token
            }
        }).then((res) => {
            return res.json();
        }).then((dt) => {
            // console.log(dt);
            if (dt && dt.cityPages) {
                $citySelect = $("#city_select").empty();
                $citySelect.append($('<option value="">Select District</option>'));
                dt.cityPages.forEach(function (ci) {
                    $optCity = $('<option />', {
                        value: ci.i,
                        'data-area': ci.u,
                        'data-area-name': ci.n,
                    }).text(ci.n);
                    $citySelect.append($optCity);

                });
            }

            // fn_fill_each_services(dt, ar, arName);
        });
    }
}

function On_CityChanged() {
    //    var ar =  $("#city_select option:selected").first().data('area');
    //    //alert(ar);
    //    location.href=`/${ar}`;
    $serviceHolder = $("#service_holder").empty();
    var ar = $("#city_select option:selected").first().data('area');
    var arName = $("#top_city_select option:selected").first().data('area-name');
    var arid = $("#city_select option:selected").first().attr('value');
    //    //alert(ar);
    //    location.href=`/${ar}`;
    if (arid) {
        fetch(__urls.GetCityServicesAjaxUrl(arid), {
            method: 'POST',
            body: JSON.stringify({
                'alpha': 'Alpha-Con',
                _token: __urls._token,
                q:$("#q").val().trim()
            }),
            headers: {
                'X-CSRF-TOKEN': __urls._token
            }
        }).then((res) => {
            return res.json();
        }).then((dt) => {
            // console.log(dt);

            fn_fill_each_services(dt, ar, arName);
        });
    } else {
        On_TopCityChanged()
    }
}

function On_SearchButtonClick() {
    var ar = $("#city_select option:selected").first().data('area');

    var arName = $("#city_select option:selected").first().data('area-name');
    var arid = $("#city_select option:selected").first().attr('value');
    //    //alert(ar);
    //    location.href=`/${ar}`;
    if (arid) {
        fetch(__urls.GetCityServicesAjaxUrl(arid), {
            method: 'POST',
            body: JSON.stringify({
                'alpha': 'Alpha-Con',
                _token: __urls._token,
                q:$("#q").val().trim()
            }),
            headers: {
                'X-CSRF-TOKEN': __urls._token
            }
        }).then((res) => {
            return res.json();
        }).then((dt) => {
            // console.log(dt);

            fn_fill_each_services(dt, ar, arName);
        });
    }
    // else {
    //     On_TopCityChanged()
    // }
}

function gtag_report_conversion(params) {

}

function changeCityTo(city, cityId) {
    history.pushState({}, city.toUpperCase(), `/${city}`);
    window.uc = window.uc || {};
    window.uc.city = city;
    window.uc.cityId = cityId;
    $(".drop_curr_city").text(city);
}

function fn_fill_each_services(dt, ar, arName) {

    if (dt && dt.services) {
        $serviceHolder = $("#service_holder").empty();
        // if (ar) {
        //     $serviceHolder.append(`
        //         <h3>See all services from <a href="${ar}">${arName}</a></h3>
        // `);
        // }
        dt.services.forEach(function (ci) {
            // ci.p = Number(ci.p);
            ci.p = ci.p?Number(ci.p):false;
            $elem = $(`
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-category">
                            <figure>
                                <img src="${ci.img}" alt="image description">
                                <figcaption class="tg-cleaning">
                                    <!--<span class="lnr lnr-magic-wand tg-categoryicon"></span>-->
                                    <span class="tg-categoryname">${ci.n}</span>
                                    ${ci.u?`<a href="${ci.u}" class="tg-themetag tg-tagjobcount">
                                        <i class="fa fa-link"></i>
                                        <em>Book now ${ci.p?' @ ₹'+ci.p.toFixed(2)+'/-':''}</em>
                                    </a>`:""}
                                </figcaption>
                            </figure>
                        </div>
                    </div>
            `);
            $serviceHolder.append($elem);

        });
    }
}

function fn_fill_each_services_area_page(dt, ar, arName) {

    if (dt && dt.services) {
        $serviceHolder = $("#service_holder").empty();
        // $serviceHolder.append(`
        //         <h3>See all services from <a href="${ar}">${ arName }</a></h3>
        // `);
        dt.services.forEach(function (ci) {
            ci.p = Number(ci.p);
            $elem = $(`
                    <div class="col-md-4 x-hidden-xs">
                        <div class="banner-subg1 ">
                            <h3>${ci.n}</h3>
                            <p class="p-2">
                                ${ci.n} @ ₹${ci.p.toFixed(2)}/-
                            </p>
                            <span class="fa fa-briefcase" aria-hidden="true"></span>
                            <div class="read-btn">
                                <a href="${ci.u}" data-href="javascript:void(0);"
                                    class="hvr-wobble-horizontal">Book This Service</a>
                            </div>
                        </div>
                    </div>
            `);
            $serviceHolder.append($elem);

        });
    }
}
