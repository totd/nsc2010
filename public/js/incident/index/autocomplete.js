function turnOnCityPersonAutocomplete() {
   $(".personCity").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-city",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnZipPersonAutocomplete() {
   $(".personZip").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-zip",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnFirstNamePersonAutocomplete() {
   $(".personFirstName").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-first-name",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnLastNamePersonAutocomplete() {
   $(".personLastName").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-last-name",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnAddress1PersonAutocomplete() {
   $(".personAddress1").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-address1",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnAddress2PersonAutocomplete() {
   $(".personAddress2").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-address2",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}

function turnOnTelephonePersonAutocomplete() {
   $(".personTelephone").autocomplete(
        {
            source: function (request, response) {
                $.ajax({
                    url: "/incident/autocomplete/get-autocomplete-person-telephone",
                    dataType: 'json',
                    data: request,
                    success: function (data) {
                        if (data.result != 0) {
                            response(data.map(function (value) {
                                return {
                                    'label': value.label,
                                    'value': value.label
                                };
                            }));
                        }
                    }
                });
            }
        }
    );
}




