// file: GameState
using UnityEngine;
using System.Collections;

public abstract class GameState : MonoBehaviour {
	protected GameManager gameManager;	
	protected void Awake() {
		gameManager = GetComponent<GameManager>();
	}
	
	public abstract void OnStateEntered();
	public abstract void OnStateExit();
	public abstract void StateUpdate();
	public abstract void StateGUI();
}
