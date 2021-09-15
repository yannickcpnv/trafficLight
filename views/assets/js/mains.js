/**
 * TrafficLight object.
 *
 * @param trafficLight
 * @param trafficLight.state
 * @param trafficLight.duration
 * @param trafficLight.isHourStoppable
 * @param trafficLight.timeBeforeReloading
 *
 * @type {any}
 */
let trafficLight = JSON.parse(document.getElementById('light-js').dataset.trafficLight)

// TODO : Calculate the time before reloading once
if (trafficLight.duration > 0 || !trafficLight.isHourStoppable) {
  setTimeout(
    () => { window.location = 'index.php?action=next&lastState=' + trafficLight.state},
    trafficLight.duration,
  )
}
