# Smarthome V2 Documentation
## JSON device integration
```json
{
  "<string: room_id>": {
    "name": "<string: display_name>",
    "devices": {
      "<string: device_id>": {
        "name": "<string: display_name>",
        "ip": "<string: ip_addres>",
        "type": "<string: device_type>",
        "index": "<int: index>"
      }
    }
  }
}
```

## Device Types:
- Roller shutter (Shelly 2.5) - `shelly.roller`
- Relay (Shelly 2.5) - `shelly.relay`
- Dimmer (Shelly Dimmer) - `shelly.dimmer`