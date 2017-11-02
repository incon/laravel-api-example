const parseUTC = date => new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds()));

$(function () {
    if ($('#devices-component')) {

        let loadingElm = $('.loading');
        let emptyElm = $('.empty');
        let devicesElm = $('.devices');
        let errorElm = $('.error');

        $.ajax({
            url: '/api/devices',
            type: 'GET'
        }).done(function (response) {
            if (response.length === 0) {
                emptyElm.show();
                return;
            }

            let devices = response.reduce((devices, device) => {
                return devices +
                    `<div class="device-item status-${device.status.toLowerCase()}"
                          title="${device.status.toLowerCase()}">
                        <div class="text-smaller">${device.uuid}</div>
                        <div class="text-larger"}>${device.label}</div>
                        <div>${parseUTC(new Date(device.checked_in_at))}</div>
                    </div>`;
            }, '');

            devicesElm.html(devices);
            devicesElm.show();

        }).fail(function (response) {
            errorElm.show();

        }).always(function (response) {
            loadingElm.hide();
        })
    }

});