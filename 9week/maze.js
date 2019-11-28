/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

 "use strict";

var loser = null;  // whether the user has hit a wall

window.onload = function() {
    var divs = $$(".boundary");
    for (var i = 0; i< divs.length; ++i) {
      divs[i].onmouseover = overBoundary;
    }
    $('start').onclick = startClick;
    $('end').onmouseover = overEnd;
    $("maze").onmouseout = overBody;
    document.body.observe("mousemove", overBody);
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
    if(loser === false) {
      var divs = $$(".boundary");
      for (var i = 0;i < divs.length; ++i) {
        divs[i].addClassName("youlose");
      }
      loser = true;
      overEnd();
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    var divs = $$(".boundary");
    for (var i = 0; i < divs.length; ++i) {
      divs[i].classList.remove("youlose");
    }
    $("status").innerHTML = 'Find the end';
    loser = false;
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if(loser) {
      $("status").innerHTML = "You lose! :(";
    }else {
      $("status").innerHTML = "You win! :)";
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if (loser === false) {
      if (event.target.getAttribute("id") === null) {
        overBoundary();
      }
    }
}
