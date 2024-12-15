$(document).ready(function () {
    try {
        $('.select2').select2();

    }
    catch (e) {

    }
});

function On_TopCityChanged() {
    $citySelect = $("#city_select").empty();
    $citySelect.append($('<option value="">Select District</option>'));
    $serviceHolder = $("#service_holder").empty();
    var ar = $("#top_city_select option:selected").first().data('area');
    var arName = $("#top_city_select option:selected").first().data('area-name');
    var arid = $("#top_city_select option:selected").first().attr('value');
    //    //alert(ar);
    //    location.href=`/${ar}`;
    if (arid) {
        fetch(__urls.GetCityPagesAjaxUrl(arid), {
            method: 'POST',
            body: {
                'alpha': 'Alpha-Con',
                _token: __urls._token
            },
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

            fn_fill_each_services(dt, ar, arName);
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
            body: {
                'alpha': 'Alpha-Con',
                _token: __urls._token
            },
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
        $serviceHolder.append(`
                <h3>See all services from <a href="${ar}">${arName}</a></h3>
        `);
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
