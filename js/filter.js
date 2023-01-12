function getParamFromCheckbox(name, params) {
    var selected = document.querySelectorAll(`input[name='${name}']:checked`);
    out = '';
    if (selected.length > 0) {
        out += params.count == 0 ? '?' : '&';
        params.count++;
        out += `${name}=`;
        var valsCount = 0;
        selected.forEach(function(elem) {
            if (valsCount > 0) {
                out += ',';
            }
            valsCount++;
            out += elem.value;
        });
    }
    return out;
}

var filterForm = document.querySelector(".sendRequest");
if (filterForm) {
    filterForm.addEventListener("click", function(e) {
        e.preventDefault();
        $.ajax({
            url : changeurl.ajaxurl,
            data : {
                'action': 'changeurl',
            },
            type : 'POST',
            beforeSend : function(){
                filterForm.textContent = changeurl.searching;
            },
            success : function(){
                var everyCheckbox = document.querySelectorAll("#filter input[type='checkbox']");
                var checkboxSet = new Set();
                if (everyCheckbox) {
                    everyCheckbox.forEach(function(elem) {
                        checkboxSet.add(elem.name);
                    });
                }
                var searchStr = document.querySelector("#searchStr").value;
                var newUrl = window.location.pathname.replace(/page.*$/, '');
                document.querySelectorAll('.breadcrumb-paged').forEach(e => e.remove());
                var params = { count: 0 };
                if (searchStr) {
                    params.count++;
                    newUrl += '?search=' + searchStr;
                }
                if (checkboxSet) {
                    checkboxSet.forEach(function(elem) {
                        newUrl += getParamFromCheckbox(elem, params);
                    });
                }
                window.history.replaceState("object or string", "Title", newUrl );
                $("#result").load(location.href + " #main");
                filterForm.textContent = changeurl.search;
            }
        });
        return false;
    });
}