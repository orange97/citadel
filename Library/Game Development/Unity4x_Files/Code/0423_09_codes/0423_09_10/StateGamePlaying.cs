// file: StateGamePlaying
using UnityEngine;
using System.Collections;

public class StateGamePlaying : GameState {
	public override void OnStateEntered(){}
	public override void OnStateExit(){}

	public override void StateGUI() {
		GUILayout.Label("state: GAME PLAYING");
		bool winGameButtonClicked = GUILayout.Button("WIN the game");
		bool loseGameButtonClicked = GUILayout.Button("LOSE the game");
		
		if( winGameButtonClicked )
			gameManager.NewGameState(gameManager.stateGameWon);
		
		if( loseGameButtonClicked )
			gameManager.NewGameState(gameManager.stateGameLost);
	}

	
	public override void StateUpdate() {	
		print ("StateGamePlaying::StateUpdate() - would do something here"); 
	}
}
