// Modules to control application life and create native browser window
const {app, BrowserWindow} = require('electron')
const remote = require('electron').remote

// Keep a global reference of the window object, if you don't, the window will
// be closed automatically when the JavaScript object is garbage collected.
let mainWindow

// -----------------------------------------
//    calls
// -----------------------------------------

// call createWindow when ready to, well, create the window
app.on('ready', createWindow)

// call macQuitApp for mac users inputting CMD + Q
app.on('window-all-closed', macQuitApp)

app.on('activate', function() {
    // On macOS it's common to re-create a window in the app when the
    // dock icon is clicked and there are no other windows open.
    if (mainWindow === null) {
        createWindow()
    }
})

// -----------------------------------------
//    functions
// -----------------------------------------

function createWindow() {
    // create the browser window.
    mainWindow = new BrowserWindow({
        backgroundColor: '#ccc',
        width: 800,
        height: 600,
        //'minWidth': 800,
		//'minHeight': 600,
		frame: false,
		center: true
    })

    // load the index.html of the app.
    mainWindow.loadFile('index.html')

    // emitted when the window is closed.
    mainWindow.on('closed', function() {
        // Dereference the window object, usually you would store windows
        // in an array if your app supports multi windows, this is the time
        // when you should delete the corresponding element.
        mainWindow = null
    })
	
}

function macQuitApp() {
	// On macOS it is common for applications and their menu bar
    // to stay active until the user quits explicitly with Cmd + Q
    if (process.platform !== 'darwin') {
        app.quit()
    }
}