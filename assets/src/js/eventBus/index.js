let data = {}

function on(events, callback) {
  events.split(' ').forEach(event => {
    data[event] = data[event] || []
    data[event].push(callback)
  })
}

function off(events, callback) {
  events.split(' ').forEach(event => {
    data[event] = data[event] || []
    data[event].filter(i => i !== callback)
  })
}

function emit(event, ...args) {
  data[event] = data[event] || []

  data[event].forEach(callback => callback(...args))
}

function destroy() {
  data = {}
}

export default { on, off, emit, destroy }
