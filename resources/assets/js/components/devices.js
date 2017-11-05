import parse from 'date-fns/parse'
import format from 'date-fns/format'

$(function () {

    if ($('#devices-component')) {
        updateDevices();
    }

    function updateDevices() {
        let loadingElm = $('.loading');
        let emptyElm = $('.empty');
        let devicesElm = $('.devices');
        let errorElm = $('.error');

        if (errorElm.is(":visible")) {
            errorElm.hide();
            loadingElm.show();
        }

        $.ajax({
            url: '/api/devices',
            type: 'GET'
        }).done(function (response) {
            if (response.length === 0) {
                devicesElm.hide();
                emptyElm.show();
                return;
            }

            let devices = response.reduce((devices, device) => {
                let UTCDate = format(parse(device.checked_in_at), 'YYYY-MM-DDTHH:mm:ss-00:00');
                return devices +
                    `<div class="device-item status-${device.status.toLowerCase()}"
                          title="${device.status.toLowerCase()}">
                        <div class="text-smaller">${device.uuid}</div>
                        <div class="text-larger"}>${device.label}</div>
                        <div>${(new Date(UTCDate))}</div>
                    </div>`;
            }, '');

            devicesElm.html(devices);
            devicesElm.show();

        }).fail(function (response) {
            devicesElm.hide();
            errorElm.show();

        }).always(function (response) {
            loadingElm.hide();
            setTimeout(updateDevices, 10000);

        })
    }
});