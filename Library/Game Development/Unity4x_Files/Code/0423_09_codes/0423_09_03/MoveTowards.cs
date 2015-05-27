// file: MoveTowards.cs
using UnityEngine;
using System.Collections;

public class MoveTowards : MonoBehaviour {
	public Transform playerTransform;
	public float speed = 5.0F;

	private void Update () {
		transform.LookAt( playerTransform );
		float distance = speed * Time.deltaTime;
		Vector3 source = transform.position;
		Vector3 target = playerTransform.position;
		transform.position = Vector3.MoveTowards(source, target, distance);
	}
}
