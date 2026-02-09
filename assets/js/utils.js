function getGuestId() {
  let guestId = localStorage.getItem("guest_id");

  if (guestId && guestId !== null && guestId !== "") {
    return guestId;
  }

  let visitorIp = localStorage.getItem("visitor_ip");
  let fingerPrint = localStorage.getItem("fingerprint");

  if (!fingerPrint) {
    fingerPrint = "fp_" + btoa(navigator.userAgent).slice(0, 12);
    localStorage.setItem("fingerprint", fingerPrint);
  }

  const finalId = visitorIp || fingerPrint;
  localStorage.setItem("guest_id", finalId);
  return finalId;
}

function getDeviceId() {
  const KEY = "radio_device_id";

  let deviceId = localStorage.getItem(KEY);

  if (!deviceId) {
    if (crypto && crypto.randomUUID) {
      deviceId = crypto.randomUUID();
    } else {
      deviceId =
        Date.now().toString(36) + Math.random().toString(36).substring(2, 10);
    }

    localStorage.setItem(KEY, deviceId);
  }

  return deviceId;
}
