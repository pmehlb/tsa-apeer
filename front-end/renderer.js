// This file is required by the index.html file and will
// be executed in the renderer process for that window.
// All of the Node.js APIs are available in this process.

const remote = require('electron').remote
// -----------------------------------------
//    custom calls
// -----------------------------------------

document.querySelector("#min-btn").addEventListener('click', function() { remote.BrowserWindow.getFocusedWindow().minimize() })
document.querySelector("#max-btn").addEventListener('click', function(e) { handleResize() })
document.querySelector("#close-btn").addEventListener('click', function() { remote.getCurrentWindow().close() })

document.querySelector("#dragbar").addEventListener('dblclick', function() { handleResize() })

// -----------------------------------------
//    custom functions
// -----------------------------------------

function handleResize() {
	remote.getCurrentWindow().setResizable(true);
    remote.getCurrentWindow().setMaximumSize(remote.screen.getPrimaryDisplay().workArea.width, remote.screen.getPrimaryDisplay().workArea.height);

    if (!remote.getCurrentWindow().isMaximized()) {
        remote.getCurrentWindow().maximize();
    } else {
        remote.getCurrentWindow().unmaximize();
        remote.getCurrentWindow().setSize(800, 600);
        remote.getCurrentWindow().setResizable(false);
    }
}