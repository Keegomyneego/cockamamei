'use strict';

//------------------------------------------------------------
// Libraries
//------------------------------------------------------------

// External
var React = require('react');
var ReactDOM = require('react-dom');

// Internal
// var TicTacToeGame = require("./game.js");
// var utils = require("./utils.js");

//------------------------------------------------------------
// Components
//------------------------------------------------------------

// External
// var ButtonGroup = require('react-bootstrap').ButtonGroup;
// var Grid = require('react-bootstrap').Grid;
// var Row = require('react-bootstrap').Row;
// var Col = require('react-bootstrap').ButtonGroup;

// Internal
// var GameBoard = require("views/components/GameBoard.js");

//------------------------------------------------------------
// View
//------------------------------------------------------------
var MainView = React.createClass({

    getDefaultProps: function () {
        return {
            model: undefined,
            controller: undefined
        };
    },

    render: function() {
        return (
            <div>
                <div>
                    <div xs={8} xsOffset={2}>

                        <div className="header small">
                            <img src="images/cockamamie_logo_small.png" alt="Cockamamie" />
                        </div>

                        <div className="navmenu" id="main-nav">
                            <ul>
                                <li>
                                    <a className="clickable" id="switch-mode">View Group Availability</a>
                                </li>
                                <li>
                                    <a className="clickable" href="/Cockamamei">Switch User</a>
                                </li>
                                <li>
                                    <a className="clickable" id="help-toggle">Help</a>
                                </li>
                            </ul>
                        </div>

                        <div className="navmenu" id="help-menu">
                            <ul>
                                <li>
                                    <a className="clickable" id="start-tutorial">Start Tutorial</a>
                                </li>
                                <li>
                                    <a className="clickable" id="show-controls">Show Controls</a>
                                </li>
                            </ul>
                            <div id="controls">
                                <img src="images/diagram-mouse.png" alt="Left click marks a timeslot as free and right click marks it as busy." />
                            </div>
                        </div>

                        <div id="module-container">
                            <div id="events">
                                <h1>Events</h1>
                                <ul>
                                    <li><b>Meeting with Cockamamei</b></li>
                                    <li className="clickable">Finalize design</li>
                                    <li className="clickable">Ideation for Krypt</li>
                                </ul>
                            </div>

                            <div id="info-display" className="good-news">
                                <h1>Getting Started</h1>
                                <p>Go ahead and set what times you're free this week.</p>
                            </div>

                            <div id="available-times" className="bad-news">
                                <h1>Available Meeting Times</h1>
                                <p>No available times : (</p>
                            </div>
                        </div>

                        <div id="weekview-container" className="view-mode">
                            <div className="change-week noselect" id="prevWeek">
                                <span>&lt;</span>
                            </div>

                            <div className="week">
                            </div>

                            <div className="change-week noselect" id="nextWeek">
                                <span>&gt;</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        );
    }
});

//------------------------------------------------------------
// Controller
//------------------------------------------------------------

class MainController {

    constructor(model, renderElementId) {
        this.model = model;
        this.renderElementId = renderElementId;
    }

    render() {
        ReactDOM.render(
            <MainView model={ this.model } controller={ this } />,
            document.getElementById(this.renderElementId)
        );
    }
}

//------------------------------------------------------------
// Main
//------------------------------------------------------------

// initial render
var model = {};
var controller = new MainController(model, 'content');
controller.render();

// run scripts
require("./scripts/index.js");
