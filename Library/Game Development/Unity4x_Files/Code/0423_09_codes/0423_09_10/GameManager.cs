// file: GameManager
using UnityEngine;
using System.Collections;

public class GameManager : MonoBehaviour {
	
	public StateGamePlaying stateGamePlaying;
	public StateGameWon stateGameWon;
	public StateGameLost stateGameLost;

	private GameState currentState;
		
	private void Awake () {
		stateGamePlaying = GetComponent<StateGamePlaying>();
		stateGameWon = GetComponent<StateGameWon>();
		stateGameLost = GetComponent<StateGameLost>();
//		stateGamePlaying.SetGameManager( this );
	}
	
	private void Start () {
		NewGameState( stateGamePlaying );
	}

	private void Update () {
		if (currentState != null)
			currentState.StateUpdate();
	}
	
	private void OnGUI () {
		if (currentState != null)
			currentState.StateGUI();
	}
	
	public void NewGameState(GameState newState)
	{
		if( null != currentState)
			currentState.OnStateExit();
		
		currentState = newState;
		currentState.OnStateEntered();
	}
}
