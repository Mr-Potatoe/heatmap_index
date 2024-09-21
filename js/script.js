window.onload = function () {
    const canvas = document.getElementById('heatmap-overlay');
    const context = canvas.getContext('2d');
    const baseMap = document.getElementById('base-map');
    
    // Adjust canvas size to match the map
    canvas.width = baseMap.clientWidth;
    canvas.height = baseMap.clientHeight;

    // Fetch heat index data
    fetch('php/get_heat_index.php')
        .then(response => response.json())
        .then(data => {
            drawHeatmap(data, context);
        });

    function drawHeatmap(data, ctx) {
        data.forEach(sensorData => {
            const { location, heat_index } = sensorData;

            // Example of location -> [x, y] on the map
            const coordinates = getLocationCoordinates(location);

            const color = getHeatIndexColor(heat_index);
            ctx.fillStyle = color;
            ctx.globalAlpha = 0.7;
            ctx.beginPath();
            ctx.arc(coordinates[0], coordinates[1], 20, 0, 2 * Math.PI);
            ctx.fill();
        });
    }

    function getLocationCoordinates(location) {
        // TODO: Implement the logic to convert sensor location into x, y coordinates on the map.
        const coords = {
            'Building 1': [200, 300],
            'Building 2': [500, 600],
            // Add more locations based on your map
        };
        return coords[location] || [0, 0];
    }

    function getHeatIndexColor(heatIndex) {
        if (heatIndex < 27) {
            return 'green';
        } else if (heatIndex < 32) {
            return 'yellow';
        } else if (heatIndex < 41) {
            return 'orange';
        } else {
            return 'red';
        }
    }
};
