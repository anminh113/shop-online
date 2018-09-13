   $(document).ready(function() {

        load_json_data('tinh-thanhpho');

        function load_json_data(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/tinh_tp.json", function(data) {
                html_code += '<option value="">Chọn tỉnh thành</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho') {
                        if (value.type == 'tinh' || value.type == 'thanh-pho') {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.code == parent_id) {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#tinh-thanhpho').html(html_code);
            });

        }
        function load_json_data1(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/quan_huyen.json", function(data) {
                html_code += '<option value="">Chọn quận huyện</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho') {
                        if (value.type == 'thanh-pho' || value.type == 'huyen' || value.type == 'thi-xa') {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#quan-huyen').html(html_code);
            });

        }
        function load_json_data2(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/xa_phuong.json", function(data) {
                html_code += '<option value="">Chọn xã phường</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho') {
                        if (value.type == 'phuong' || value.type == 'xa') {
                            html_code += '<option value="' + value.path_with_type + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            html_code += '<option value="' + value.path_with_type + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#xa-phuong').html(html_code);
            });

        }

        $(document).on('change', '#tinh-thanhpho', function() {
            var country_id = $(this).val();
            console.log("ID: " + country_id);
            if (country_id != '') {
                load_json_data1('quan-huyen', country_id);
            } else {
                $('#quan-huyen').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong').html('<option value="">Chọn xã phường</option>');
            }
        });
        $(document).on('change', '#quan-huyen', function() {
            var state_id = $(this).val();
            console.log("ID: " + state_id);
            if (state_id != '') {
                load_json_data2('xa-phuong', state_id);
            } else {
                 $('#quan-huyen').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong').html('<option value="">Chọn xã phường</option>');
            }
        });
    });




    $(document).ready(function() {

        load_json_data('tinh-thanhpho-user');

        function load_json_data(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/tinh_tp.json", function(data) {
                html_code += '<option value="">Chọn tỉnh thành</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho-user') {
                        if (value.type == 'tinh' || value.type == 'thanh-pho') {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.code == parent_id) {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#tinh-thanhpho-user').html(html_code);
            });

        }
        function load_json_data1(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/quan_huyen.json", function(data) {
                html_code += '<option value="">Chọn quận huyện</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho-user') {
                        if (value.type == 'thanh-pho' || value.type == 'huyen' || value.type == 'thi-xa') {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            html_code += '<option value="' + value.code + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#quan-huyen-user').html(html_code);
            });

        }
        function load_json_data2(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/xa_phuong.json", function(data) {
                html_code += '<option value="">Chọn xã phường</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho-user') {
                        if (value.type == 'phuong' || value.type == 'xa') {
                            html_code += '<option value="' + value.path_with_type + '">' + value.name_with_type + '</option>';
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            html_code += '<option value="' + value.path_with_type + '">' + value.name_with_type + '</option>';
                        }
                    }
                });
                $('#xa-phuong-user').html(html_code);
            });

        }

        $(document).on('change', '#tinh-thanhpho-user', function() {
            var country_id = $(this).val();
            console.log("ID: " + country_id);
            if (country_id != '') {
                load_json_data1('quan-huyen', country_id);
            } else {
                $('#quan-huyen-user').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user').html('<option value="">Chọn xã phường</option>');
            }
        });
        $(document).on('change', '#quan-huyen-user', function() {
            var state_id = $(this).val();
            console.log("ID: " + state_id);
            if (state_id != '') {
                load_json_data2('xa-phuong', state_id);
            } else {
                 $('#quan-huyen-user').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user').html('<option value="">Chọn xã phường</option>');
            }
        });
    });