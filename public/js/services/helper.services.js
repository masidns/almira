angular.module('helper.service', []).factory('helperServices', helperServices);

function helperServices($location) {
    var service = { IsBusy: false, absUrl: $location.$$absUrl };
    service.url = $location.$$protocol + '://' + $location.$$host;
    if ($location.$$port) {
        // service.url = service.url + ':' + $location.$$port;
        service.url = service.url + ':' + $location.$$port + '/almira';
    }

    // '    http://localhost:5000';

    service.groupBy = (list, keyGetter) => {
        const map = new Map();
        list.forEach((item) => {
            const key = keyGetter(item);
            const collection = map.get(key);
            if (!collection) {
                map.set(key, [item]);
            } else {
                collection.push(item);
            }
        });
        return map;
    };
    service.roles = [{ idrule: 1, rule: 'Admin' }, { idrule: 2, rule: 'Siswa' }, { idrule: 3, rule: 'Staf' }]
    service.sex = ['Pria', 'Wanita'];
    service.ketPaket = ['Dengan SIM', 'Tanpa SIM'];
    service.nilai = ['A - Sangat Baik', 'B - Baik', 'C - Cukup', 'D - Kurang', 'E - Sangat Kurang'];
    service.hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    service.romanize = (num) => {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
                "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
                "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"
            ],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }
    service.itemgrafik = ['Gender', 'Usia'];
    return service;
}