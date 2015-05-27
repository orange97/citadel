using UnityEngine;
using System.Collections;

public class GameManager : MonoBehaviour {
	private float gameStartTime;
	private float gamePlayingTime;
	
	private enum GameStateType {
		STATE_GAME_PLAYING,
		STATE_GAME_WON,
		STATE_GAME_LOST,
	}
	
	private GameStateType currentState;
		
	private void Start () {
		NewGameState( GameStateType.STATE_GAME_PLAYING );
	}

	private void NewGameState(GameStateType newState) {
		// (1) state EXIT actions
		switch( currentState ) {
		case GameStateType.STATE_GAME_PLAYING:
			gameStartTime = Time.time;
			break;
		}

		// (2) change current state
		currentState = newState;

		// (3) state ENTER actions
	}
		
	private void Update () {
		switch( currentState ) {
		case GameStateType.STATE_GAME_PLAYING:
			StateGamePlayingUpdate();
			break;
		case GameStateType.STATE_GAME_WON:
			StateGameWonUpdate();
			break;
		case GameStateType.STATE_GAME_LOST:
			StateGameLostUpdate();
			break;
		}
	}
	
	private void OnGUI () {
		switch( currentState ) {
		case GameStateType.STATE_GAME_PLAYING:
			StateGamePlayingGUI();
			break;
		case GameStateType.STATE_GAME_WON:
			StateGameWonGUI();
			break;
		case GameStateType.STATE_GAME_LOST:
			StateGameLostGUI();
			break;
		}
	}
	
	private void StateGamePlayingGUI() {
		GUILayout.Label("state: GAME PLAYING - time since game started = "  + gamePlayingTime);
		bool winGameButtonClicked = GUILayout.Button("WIN the game");
		bool loseGameButtonClicked = GUILayout.Button("LOSE the game");
		
		if( winGameButtonClicked )
			NewGameState( GameStateType.STATE_GAME_WON );
		
		if( loseGameButtonClicked )
			NewGameState( GameStateType.STATE_GAME_LOST );
	}

	private void StateGameWonGUI() {
		GUILayout.Label("state: GAME WON - game duration = " + gamePlayingTime);
	}

	private void StateGameLostGUI() {
		GUILayout.Label("state: GAME LOST - game duration = " + gamePlayingTime);
	}
	
	private void StateGameWonUpdate() {	print("update - state: GAME WON"); }
	private void StateGameLostUpdate() {	print("update - state: GAME LOST"); }

	private void StateGamePlayingUpdate() {
		gamePlayingTime = (Time.time - gameStartTime);
		print("update - state: GAME PLAYING :: time since game started = " + gamePlayingTime); 
	}

}
